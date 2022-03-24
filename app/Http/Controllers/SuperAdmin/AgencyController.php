<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Agency;
use Auth;
use Response;
use File;

class AgencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $agencies = Agency::where('created_by', Auth::user()->id)->get();
        return view('superadmin.agency.index', compact('agencies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('superadmin.agency.create');
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
            'contact_no' => 'required',
            'website_link' => 'required',
            'image' => 'required',
        ]);
         
        $uppdf = $request->file('image');
        if($uppdf != ""){
            $destinationPath = 'images/agency/';
            $extension = $uppdf->getClientOriginalExtension();
            $fileName = md5(mt_rand()).'.'.$extension;
            $uppdf->move($destinationPath, $fileName);
            $file_path = $destinationPath.'/'.$fileName;

        }else{
            $fileName = Null;
        }
       $agencies = Agency::create([
            'contact_no' => $request['contact_no'],
            'website_link' => $request['website_link'],
            'image'=> $fileName,
            'date_np' => $this->helper->date_np_con_parm(date("Y-m-d")),
            'date' => date("Y-m-d"),
            'time' => date("H:i:s"),
            'created_by' => Auth::user()->id,
        ]);
        $pass = array(
          'message' => 'Data added successfully!',
          'alert-type' => 'success'
        );
        return redirect()->route('superadmin.agency.index');
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
        $agencies = Agency::find($id);
        return view('superadmin.agency.edit', compact('agencies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Agency $agency)
    {
        $this->validate($request, [
          'contact_no' => 'required',

        ]);
        $all_data = $request->all();
        $uppdf = $request->file('image');
        if($uppdf != ""){
          $this->validate($request, [
            'image' => 'required|mimes:jpeg,jpg|max:1024',
          ]);
         
          $destinationPath = 'images/agency/';
          $oldFilename = $destinationPath.'/'.$header->image;

          $extension = $uppdf->getClientOriginalExtension();
          $fileName = md5(mt_rand()).'.'.$extension;
          $uppdf->move($destinationPath, $fileName);
          $file_path = $destinationPath.'/'.$fileName;
          $all_data['image'] = $fileName;
          if(File::exists($oldFilename)) {
            File::delete($oldFilename);
          }
        }
        $all_data['updated_by'] = Auth::user()->id;
        $agency->update($all_data);
        return redirect()->route('superadmin.agency.index')->with('success', 'header updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $agencies = Agency::find($id);
        $destinationPath = 'images/agency/';
        $oldFilename = $destinationPath.'/'.$agencies->image;

        if($agencies->delete()){
            if(File::exists($oldFilename)) {
                File::delete($oldFilename);
            }
            $notification = array(
              'message' => $agencies->name.' is deleted successfully!',
              'status' => 'success'
          );
        }else{
            $notification = array(
              'message' => $agencies->name.' could not be deleted!',
              'status' => 'error'
          );
        }
        return Response::json($notification);
    }

    public function isActive(Request $request,$id)
    {
        $get_is_active = Agency::where('id',$id)->value('is_active');
        $isactive = Agency::find($id);
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
