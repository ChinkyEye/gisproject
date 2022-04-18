<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Header;
use File;
use Auth;
use Response;

class HeaderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $headers = Header::orderBy('id', 'DESC')->get();
        return view('superadmin.header.index', compact('headers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('superadmin.header.create');
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
            'slogan' => 'required',
            'image' => 'required|mimes:png,jpeg|max:1024',
        ]);
         
        $uppdf = $request->file('image');
        if($uppdf != ""){
            $this->validate($request, [
                'image' => 'required|mimes:jpeg,jpg,png',
            ]);
            $destinationPath = 'images/logo/';
            $extension = $uppdf->getClientOriginalExtension();
            $mimes = $uppdf->getMimeType();
            $fileName = md5(mt_rand()).'.'.$extension;
            $uppdf->move($destinationPath, $fileName);
            $file_path = $destinationPath.'/'.$fileName;

        }else{
            $fileName = Null;
            $destinationPath = Null;
            $mimes = Null;
        }
       $headers = Header::create([
            'name' => $request['name'],
            'document'=> $fileName,
            'path'=> $destinationPath,
            'mimes_type'=> $mimes,
            'slogan' => $request['slogan'],
            'is_active' => '1',
            'date' => date("Y-m-d"),
            'date_np' => $this->helper->date_np_con_parm(date("Y-m-d")),
            'time' => date("H:i:s"),
            'created_by' => Auth::user()->id,
        ]);
        return redirect()->route('superadmin.header.index')->with('alert-success', 'Header created successfully!!!!');
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
      $headers = Header::find($id);
      return view('superadmin.header.edit', compact('headers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $this->validate($request, [
          'name' => 'required',
          'slogan' => 'required',

        ]); 
        $header = Header::find($id);
        $all_data = $request->all();
        $uppdf = $request->file('image');
        if($uppdf != ""){
          $this->validate($request, [
            'image' => 'required|mimes:jpeg,jpg,png',
          ]);
         
          $destinationPath = 'images/logo/';
          $oldFilename = $destinationPath.'/'.$header->document;

          $extension = $uppdf->getClientOriginalExtension();
          $name = $uppdf->getClientOriginalName();
          $fileName = $name.'.'.$extension;
          $uppdf->move($destinationPath, $fileName);
          $file_path = $destinationPath.'/'.$fileName;
          $all_data['document'] = $fileName;
          if(File::exists($oldFilename)) {
            File::delete($oldFilename);
          }
        }
        $all_data['updated_by'] = Auth::user()->id;
        $header->update($all_data);
        $header->update();
       
        return redirect()->route('superadmin.header.index')->with('alert-success', 'Header updated successfully!!!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $headers = Header::find($id);
        $destinationPath = 'images/logo/';
        $oldFilename = $destinationPath.'/'.$headers->document;

        if($headers->delete()){
            if(File::exists($oldFilename)) {
                File::delete($oldFilename);
                // File::deleteDirectory($destinationPath);
            }
            $notification = array(
              'message' => $headers->name.' is deleted successfully!',
              'status' => 'success'
          );
        }else{
            $notification = array(
              'message' => $headers->name.' could not be deleted!',
              'status' => 'error'
          );
        }
        return Response::json($notification);
    }
   
     public function isActive(Request $request,$id)
    {
        $get_is_active = Header::where('id',$id)->value('is_active');
        $isactive = Header::find($id);
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
