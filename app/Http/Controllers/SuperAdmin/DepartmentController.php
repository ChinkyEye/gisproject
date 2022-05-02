<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Department;
use Auth;
use File;
use Response;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Department::orderBy('id', 'DESC')->get();
        return view('superadmin.department.index',compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('superadmin.department.create');
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
            'office_name' => 'required',
            'name' => 'required',
        ]);
        $uppdf = $request->file('image');
        if($uppdf != ""){
         $this->validate($request, [
            'image' => 'required|mimes:jpeg,jpg,png',
        ]);
         $destinationPath = 'images/department/';
         $extension = $uppdf->getClientOriginalExtension();
         $mimes = $uppdf->getMimeType();
         $fileName = md5(mt_rand()).'.'.$extension;
         $uppdf->move($destinationPath, $fileName);
         $file_path = $destinationPath.'/'.$fileName;

     }else{
        $fileName = Null;
        $destinationPath = Null;
        $extension = Null;
        $mimes = Null;
    }
    $departments = Department::create([
        'name' => $request['name'],
        'email'=> $request['email'],
        'phone'=> $request['phone'],
        'address' => $request['address'],
        'office_name' => $request['office_name'],
        'designation'=> $request['designation'],
        'work_to_be_done'=> $request['work_to_be_done'],
        'document'=> $fileName,
        'path'=> $destinationPath,
        'mimes_type'=> $mimes,
        'date_np' => $this->helper->date_np_con_parm(date("Y-m-d")),
        'date' => date("Y-m-d"),
        'time' => date("H:i:s"),
        'created_by' => Auth::user()->id,
    ]);
    return redirect()->route('superadmin.department.index')->with('alert-success', 'data created succesffully!!!');
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
     $data = Department::find($id);
     return view('superadmin.department.edit', compact('data'));
     }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
         'office_name' => 'required',
         'name' => 'required',
     ]);

        $datas = Department::find($id);
        $all_data = $request->all();
        $uppdf = $request->file('image');
        if($uppdf != ""){
            $this->validate($request, [
                'image' => 'required|mimes:jpeg,jpg,png',
            ]);
            $destinationPath = 'images/department/';
            $oldFilename = $destinationPath.'/'.$datas->document;
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
        $datas->update($all_data);
        $datas->update();
        return redirect()->route('superadmin.department.index')->with('alert-success', 'Department updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $datas = Department::find($id);
        $destinationPath = 'images/department/';
        $oldFilename = $destinationPath.'/'.$datas->document;
        if($datas->delete()){
            if(File::exists($oldFilename)) {
                File::delete($oldFilename);
                // File::deleteDirectory($destinationPath);
            }
            $notification = array(
              'message' => $datas->title.' is deleted successfully!',
              'status' => 'success'
          );
        }else{
            $notification = array(
              'message' => $datas->title.' could not be deleted!',
              'status' => 'error'
          );
        }
        return Response::json($notification);
    }

    public function isActive(Request $request,$id)
    {
        $get_is_active = Department::where('id',$id)->value('is_active');
        $isactive = Department::find($id);
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
