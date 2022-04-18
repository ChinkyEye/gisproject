<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Slider;
use Auth;
use File;
use Response;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::orderBy('id', 'DESC')->get();
        return view('superadmin.slider.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('superadmin.slider.create');
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
            'image' => 'required|mimes:jpeg,jpg,png',
        ]);
     
        $uppdf = $request->file('image');
        if($uppdf != ""){
            $destinationPath = 'images/slider/';
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
        $sliders = Slider::create([
            'name' => $request['name'],
            'document'=> $fileName,
            'path'=> $destinationPath,
            'mimes_type'=> $mimes,
            'is_active' => '1',
            'date' => date("Y-m-d"),
            'date_np' => $this->helper->date_np_con_parm(date("Y-m-d")),
            'time' => date("H:i:s"),
            'created_by' => Auth::user()->id,
        ]);
        
        return redirect()->route('superadmin.slider.index')->with('alert-success', 'Slider added successfully');  
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
        $sliders = Slider::find($id);
        return view('superadmin.slider.edit',compact('sliders'));
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
        ]);

        $slider = Slider::find($id);
        $all_data = $request->all();
        $uppdf = $request->file('image');
        if($uppdf != ""){
            $this->validate($request, [
                'image' => 'required|mimes:jpeg,jpg,png',
            ]);
            $destinationPath = 'images/slider/';
            $oldFilename = $destinationPath.'/'.$slider->document;
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
        $slider->update($all_data);
        $slider->update();
        return redirect()->route('superadmin.slider.index')->with('alert-success', 'Slider updated successfully');
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sliders = Slider::find($id);
        $destinationPath = 'images/slider/';
        $oldFilename = $destinationPath.'/'.$sliders->document;

        if($sliders->delete()){
            if(File::exists($oldFilename)) {
                File::delete($oldFilename);
                // File::deleteDirectory($destinationPath);
            }
            $notification = array(
              'message' => $sliders->name.' is deleted successfully!',
              'status' => 'success'
          );
        }else{
            $notification = array(
              'message' => $sliders->name.' could not be deleted!',
              'status' => 'error'
          );
        }
        return Response::json($notification);
    }
    public function isActive(Request $request,$id)
    {
        $get_is_active = Slider::where('id',$id)->value('is_active');
        $isactive = Slider::find($id);
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
