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
                'thumbnail' => 'required|mimes:jpg,png,jpeg,|max:2048',
            ]);
            $destinationPath = 'images/thumbnail/';
            $extension = $uppdf->getClientOriginalExtension();
            $fileName = md5(mt_rand()).'.'.$extension;
            $uppdf->move($destinationPath, $fileName);
            $file_path = $destinationPath.'/'.$fileName;

        }else{
            $fileName = Null;
        } 

        $uppd = $request->file('logo');
        if($uppd != ""){
            $this->validate($request, [
                'logo' => 'required|mimes:jpg,png,jpeg,|max:2048',
            ]);
            $destination = 'images/eservicelogo/';
            $extensions = $uppd->getClientOriginalExtension();
            $fileNaam = md5(mt_rand()).'.'.$extensions;
            $uppd->move($destination, $fileNaam);
            $file_path = $destination.'/'.$fileNaam;

        }else{
            $fileNaam = Null;
        }

        $eservices = Eservice::create([
            'name' => $request['name'],
            'thumbnail'=> $fileName,
            'logo' => $fileNaam,
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

        $uppdf = $request->file('logo');
        $uppd = $request->file('thumbnail');
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
                'logo' => 'required|mimes:jpg,png,|max:2048',
            ]);
            $destinationPath = 'images/eservicelogo/';
            $oldFilename = $destinationPath.'/'.$eservice->logo;

            $extension = $uppdf->getClientOriginalExtension();
            $fileName = md5(mt_rand()).'.'.$extension;
            $uppdf->move($destinationPath, $fileName);
            $file_path = $destinationPath.'/'.$fileName;
            $all_data['logo'] = $fileName;
            if(File::exists($oldFilename)) {
                File::delete($oldFilename);
            }
        } 
        if($uppd != ""){
            $this->validate($request, [
                'thumbnail' => 'required|mimes:jpg,png,|max:2048',
            ]);
            $destination = 'images/thumbnail/';
            $oldFilenaam = $destination.'/'.$eservice->thumbnail;

            $extensions = $uppd->getClientOriginalExtension();
            $fileNaam = md5(mt_rand()).'.'.$extensions;
            $uppd->move($destination, $fileNaam);
            $filePath = $destination.'/'.$fileNaam;
            $all_data['thumbnail'] = $fileNaam;
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

     $destinationPath = 'images/thumbnail/';
     $oldFilename = $destinationPath.'/'.$eservices->thumbnail;

     $destination = 'images/eservicelogo';
     $oldfile = $destination.'/'.$eservices->logo;

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
