<?php
 
namespace App\Http\Controllers\SuperAdmin\Eservice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Eservice;
use Auth;
use File;
use Response;

class EserviceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $eservices = Eservice::get();
        return view('superadmin.eservice.index',compact('eservices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('superadmin.eservice.create');
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
            'karyalaya' => 'required',
           
        ]);
        $number = $request['contact'];
        if($number != ""){
            $this->validate($request, [
                'contact' => 'required|digits_between:6,10',
            ]); 
        }
        else{
            Null;
        }
        $uppdf = $request->file('thumbnail');
        if($uppdf != ""){
            $this->validate($request, [
                'thumbnail' => 'required|mimes:jpg,png,jpeg',
            ]);
            $destinationPathThumbnail = 'images/thumbnail/';
            $extension = $uppdf->getClientOriginalExtension();
            $fileName = md5(mt_rand()).'.'.$extension;
            $mimes = $uppdf->getMimeType();
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
            $destinationLogo = 'images/eservicelogo/';
            $extensions = $uppd->getClientOriginalExtension();
            $fileNaam = md5(mt_rand()).'.'.$extensions;
            $mimes = $uppd->getMimeType();
            $uppd->move($destinationLogo, $fileNaam);
            $file_path = $destinationLogo.'/'.$fileNaam;

        }else{
            $fileNaam = Null;
            $destinationLogo = Null;
        }

        $eservices = Eservice::create([
            'name' => $request['name'],
            'thumbnail'=> $fileName,
            'logo' => $fileNaam,
            'pathlogo' => $destinationLogo,
            'paththumbnail' => $destinationPathThumbnail,
            'mimes_type' => $mimes,
            'karyalaya' =>$request['karyalaya'],
            'contact' => $request['contact'],
            'website_link' => $request['website_link'],
            'is_active' => '1',
            'date' => date("Y-m-d"),
            'date_np' => $this->helper->date_np_con_parm(date("Y-m-d")),
            'time' => date("H:i:s"),
            'created_by' => Auth::user()->id,
        ]);
        return redirect()->route('superadmin.eservice.index')->with('alert-success', 'Data created successfully!!!!');  
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
        $eservices = Eservice::find($id);
        return view('superadmin.eservice.edit',compact('eservices'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  Eservice $eservice)
    {
     
        $this->validate($request, [
            'name' => 'required',
            'karyalaya' => 'required',
        ]);
        
        $all_data = $request->all();

        $uppdf = $request->file('thumbnail');
        $uppd = $request->file('logo');
        $number = $request['phone'];
        
        if($number != ""){
            $this->validate($request, [
                'phone' => 'required|digits_between:6,10',
            ]); 
         }
         else{
            Null;
         }

        if($uppdf != ""){
            $this->validate($request, [
                'thumbnail' => 'required|mimes:jpg,png',
            ]);
            $destinationPathThumbnail = 'images/thumbnail/';
            $oldFilename = $destinationPathThumbnail.'/'.$eservice->thumbnail;

            $extension = $uppdf->getClientOriginalExtension();
            $fileName = md5(mt_rand()).'.'.$extension;
            $uppdf->move($destinationPathThumbnail, $fileName);
            $file_path = $destinationPathThumbnail.'/'.$fileName;
            $all_data['thumbnail'] = $fileName;
            $all_data['paththumbnail'] = $destinationPathThumbnail;
            if(File::exists($oldFilename)) {
                File::delete($oldFilename);
            }
        } 
        if($uppd != ""){
            $this->validate($request, [
                'logo' => 'required|mimes:jpg,png,|max:2048',
            ]);
            $destinationLogo = 'images/eservicelogo/';
            $oldFilenaam = $destinationLogo.'/'.$eservice->logo;

            $extensions = $uppd->getClientOriginalExtension();
            $fileNaam = md5(mt_rand()).'.'.$extensions;
            $uppd->move($destinationLogo, $fileNaam);
            $filePath = $destinationLogo.'/'.$fileNaam;
            $all_data['logo'] = $fileNaam;
            $all_data['pathlogo'] = $destinationLogo;
            if(File::exists($oldFilenaam)) {
                File::delete($oldFilenaam);
            }
        }

        $all_data['updated_by'] = Auth::user()->id;
        $eservice->update($all_data);
        return redirect()->route('superadmin.eservice.index')->with('alert-success', 'Data updated successfully!!!!');
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
     $eservices = Eservice::find($id);

     $destinationPathThumbnail = 'images/thumbnail/';
     $oldFilename = $destinationPathThumbnail.'/'.$eservices->thumbnail;

     $destinationLogo = 'images/eservicelogo';
     $oldfile = $destinationLogo.'/'.$eservices->logo;

     if($eservices->delete()){
        if(File::exists($oldFilename,$oldfile)) {
            File::delete($oldFilename,$oldfile);
        }
        $notification = array(
          'message' => $eservices->name.' is deleted successfully!',
          'status' => 'success'
      );
    }else{
        $notification = array(
          'message' => $eservices->name.' could not be deleted!',
          'status' => 'error'
      );
    }
    return Response::json($notification);
}
public function isActive(Request $request,$id)
{
    $get_is_active = Eservice::where('id',$id)->value('is_active');
    $isactive = Eservice::find($id);
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
