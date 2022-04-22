<?php

namespace App\Http\Controllers\SuperAdmin\Office;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Office;
use Auth;
use Response;
use File;


class OfficeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $offices =Office::orderBy('id','DESC')
                        ->where('created_by', Auth::user()->id)
                        ->paginate(10);
       return view('superadmin.office.index',compact('offices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('superadmin.office.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $this->validate($request, [
            'name' => 'required',
            'address' => 'required',
           
        ]);
        $uppdf = $request->file('thumbnail');
        if($uppdf != ""){
            $this->validate($request, [
                'thumbnail' => 'required|mimes:jpg,png,jpeg',
            ]);
            $destinationPathThumbnail = 'images/officethumbnail/';
            $extension = $uppdf->getClientOriginalExtension();
            $mimes = $uppdf->getMimeType();
            $fileName = md5(mt_rand()).'.'.$extension;
            $uppdf->move($destinationPathThumbnail, $fileName);
            $file_path = $destinationPathThumbnail.'/'.$fileName;

        }else{
            $fileName = Null;
            $destinationPathThumbnail = Null;
            $mimes = Null;
        } 

        $uppd = $request->file('logo');
        if($uppd != ""){
            $this->validate($request, [
                'logo' => 'required|mimes:jpg,png,jpeg',
            ]);
            $destinationLogo = 'images/officelogo/';
            $extensions = $uppd->getClientOriginalExtension();
            $mimes = $uppd->getMimeType();
            $fileNaam = md5(mt_rand()).'.'.$extensions;
            $uppd->move($destinationLogo, $fileNaam);
            $file_path = $destinationLogo.'/'.$fileNaam;

        }else{
            $fileNaam = Null;
            $destinationLogo = Null;
        }

        $offices = Office::create([
            'name' => $request['name'],
            'address' =>$request['address'],
            'website_link' => $request['website_link'],
            'thumbnail'=> $fileName,
            'logo' => $fileNaam,
            'pathlogo' => $destinationLogo,
            'paththumbnail' => $destinationPathThumbnail,
            'mimes_type' => $mimes,
            'is_active' => '1',
            'date' => date("Y-m-d"),
            'date_np' => $this->helper->date_np_con_parm(date("Y-m-d")),
            'time' => date("H:i:s"),
            'created_by' => Auth::user()->id,
        ]);
        return redirect()->route('superadmin.office.index')->with('alert-success', 'Data created successfully!!!!');  
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $offices = Office::find($id);
         return view('superadmin.office.edit', compact('offices'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Office $office)
    {
        $this->validate($request, [
            'name' => 'required',
            'address' => 'required',
            
        ]);
        
        $all_data = $request->all();

        $uppdf = $request->file('logo');
        $uppd = $request->file('thumbnail');

        if($uppdf != ""){
            $this->validate($request, [
                'logo' => 'required|mimes:jpg,png,|max:1048',
            ]);
            $destinationPathThumbnail = 'images/officelogo/';
            $oldFilename = $destinationPathThumbnail.'/'.$office->logo;

            $extension = $uppdf->getClientOriginalExtension();
            $fileName = md5(mt_rand()).'.'.$extension;
            $uppdf->move($destinationPathThumbnail, $fileName);
            $file_path = $destinationPathThumbnail.'/'.$fileName;
            $all_data['logo'] = $fileName;
            if(File::exists($oldFilename)) {
                File::delete($oldFilename);
            }
        } 
        if($uppd != ""){
            $this->validate($request, [
                'thumbnail' => 'required|mimes:jpg,png,|max:1048',
            ]);
            $destinationLogo = 'images/officethumbnail/';
            $oldFilenaam = $destinationLogo.'/'.$office->thumbnail;

            $extensions = $uppd->getClientOriginalExtension();
            $fileNaam = md5(mt_rand()).'.'.$extensions;
            $uppd->move($destinationLogo, $fileNaam);
            $filePath = $destinationLogo.'/'.$fileNaam;
            $all_data['thumbnail'] = $fileNaam;
            if(File::exists($oldFilenaam)) {
                File::delete($oldFilenaam);
            }
        }

        $all_data['updated_by'] = Auth::user()->id;
        $office->update($all_data);
        return redirect()->route('superadmin.office.index')->with('alert-success', 'Data updated successfully!!!!');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $offices = Office::find($id);

     $destinationPathThumbnail = 'images/officethumbnail/';
     $oldFilename = $destinationPathThumbnail.'/'.$offices->thumbnail;

     $destinationLogo = 'images/officelogo';
     $oldfile = $destinationLogo.'/'.$offices->logo;

     if($offices->delete()){
        if(File::exists($oldFilename,$oldfile)) {
            File::delete($oldFilename,$oldfile);
        }
        $notification = array(
          'message' => $offices->name.' is deleted successfully!',
          'status' => 'success'
      );
    }else{
        $notification = array(
          'message' => $offices->name.' could not be deleted!',
          'status' => 'error'
      );
    }
    return Response::json($notification);
    }
     public function isActive(Request $request,$id)
    {
        $get_is_active = Office::where('id',$id)->value('is_active');
        $isactive = Office::find($id);
        if($get_is_active == 0){
        $isactive->is_active = 1;
        $notification = array(
          'message' => $isactive->name.' is Active!',
          'alert-type' => 'success'
        );
        }
        else {
        $isactive->is_active = 0;
        $notification = array(
          'message' => $isactive->name.' is inactive!',
          'alert-type' => 'error'
        );
        }
        if(!($isactive->update())){
        $notification = array(
          'message' => $isactive->name.' could not be changed!',
          'alert-type' => 'error'
        );
        }
        return back()->with($notification)->withInput();
    }
}
