<?php

namespace App\Http\Controllers\SuperAdmin\PradeshSarkar;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\PradeshSarkar;
use File;
use Auth;
use Response;

class PradeshSarkarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = PradeshSarkar::get();
        return view('superadmin.pradeshsarkar.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('superadmin.pradeshsarkar.create');
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
            'title' => 'required',
            'description' => 'required',
        ]);
        $uppdf = $request->file('image');
        if($uppdf != ""){
            $this->validate($request, [
                'image' => 'required|mimes:jpg,png,jpeg,|max:2048',
            ]);
            $destinationPath = 'images/pradeshsarkar/';
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
        $datas = PradeshSarkar::create([
            'title' => $request['title'],
            'description' => $request['description'],
            'document'=> $fileName,
            'path'=> $destinationPath,
            'mimes_type'=> $mimes,
            'is_active' => '1',
            'date' => date("Y-m-d"),
            'date_np' => $this->helper->date_np_con_parm(date("Y-m-d")),
            'time' => date("H:i:s"),
            'created_by' => Auth::user()->id,
        ]);
        
        return redirect()->route('superadmin.pradeshsarkar.index')->with('alert-success', 'Data added successfully!!');  
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
        $datas = PradeshSarkar::find($id); 
        return view('superadmin.pradeshsarkar.edit',compact('datas'));
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
            'title' => 'required',
            'description' => 'required',
        ]);

        $datas = PradeshSarkar::find($id);
        $all_data = $request->all();
        $uppdf = $request->file('image');
        if($uppdf != ""){
            $this->validate($request, [
                'image' => 'required|mimes:jpg,jpeg,png',               
            ]);
            $destinationPath = 'images/pradeshsarkar/';
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
        if($datas->update($all_data))
        {
            return redirect()->route('superadmin.pradeshsarkar.index')->with('alert-success', 'Data updated succesffully!!!');;
        };
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $datas = PradeshSarkar::find($id);
        $destinationPath = 'images/pradeshsarkar/';
        $oldFilename = $destinationPath.'/'.$datas->document;

        if($datas->delete()){
            if(File::exists($oldFilename)) {
                File::delete($oldFilename);
                // File::deleteDirectory($destinationPath);
            }
            $notification = array(
              'message' => $datas->name.' is deleted successfully!',
              'status' => 'success'
          );
        }else{
            $notification = array(
              'message' => $datas->name.' could not be deleted!',
              'status' => 'error'
          );
        }
        return Response::json($notification);
    }
    public function isActive(Request $request,$id)
    {
        $get_is_active = PradeshSarkar::where('id',$id)->value('is_active');
        $isactive = PradeshSarkar::find($id);
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
