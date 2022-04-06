<?php

namespace App\Http\Controllers\SuperAdmin\HelloCM;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\HelloCM;
use Auth;
use File;

class HelloCMController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = HelloCM::orderBy('id','DESC')
                        ->where('created_by', Auth::user()->id)
                        ->paginate(10);
        return view('superadmin.hellocm.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('superadmin.hellocm.create');
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
            'email' => 'required',
            'link' => 'required',
        ]);
        $uppdf = $request->file('image');
        if($uppdf != ""){
            $this->validate($request, [
                'image' => 'required|mimes:jpg,jpeg|max:1024',
            ]);
            $destinationPath = 'images/hellocm/';
            $extension = $uppdf->getClientOriginalExtension();
            $fileName = md5(mt_rand()).'.'.$extension;
            $uppdf->move($destinationPath, $fileName);
            $file_path = $destinationPath.'/'.$fileName;

        }else{
            $fileName = Null;
        }
       $datas = HelloCM::create([
            'email' => $request['email'],
            'description' => $request['description'],
            'thumbnail'=> $fileName,
            'link' => $request['link'],
            'date_np' => $this->helper->date_np_con_parm(date("Y-m-d")),
            'date' => date("Y-m-d"),
            'time' => date("H:i:s"),
            'created_by' => Auth::user()->id,
        ]);
        return redirect()->route('superadmin.hellocm.index')->with('alert-success', 'Data created succesffully!!!!');
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
        $datas = HelloCM::find($id);
        return view('superadmin.hellocm.edit', compact('datas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HelloCM $hellocm)
    {
        $this->validate($request, [
            'email' => 'required',
            'link' => 'required',
        ]);
        $all_data = $request->all();
        $uppdf = $request->file('image');
        // dd($uppdf);
        if($uppdf != ""){
            $this->validate($request, [
                'image' => 'required|mimes:jpg,jpeg|max:1024',
            ]);
            $destinationPath = 'images/hellocm/';
            $oldFilename = $destinationPath.'/'.$hellocm->image;

            $extension = $uppdf->getClientOriginalExtension();
            $name = $uppdf->getClientOriginalName();
            $fileName = $name.'.'.$extension;
            $uppdf->move($destinationPath, $fileName);
            $file_path = $destinationPath.'/'.$fileName;
            $all_data['thumbnail'] = $fileName;
            if(File::exists($oldFilename)) {
                File::delete($oldFilename);
            }
        }
        $all_data['updated_by'] = Auth::user()->id;
        if($hellocm->update($all_data))
        {
            return redirect()->route('superadmin.hellocm.index')->with('alert-success', 'Data updated succesffully!!!!');;
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
        $datas = HelloCM::find($id);
        $destinationPath = 'images/hellocm/';
        $oldFilename = $destinationPath.'/'.$datas->thumbnail;
        if($datas->delete()){
            if(File::exists($oldFilename)) {
                File::delete($oldFilename);
            }
        }
        return response()->json([
            'success' => 'Record has been deleted successfully!'
        ]);
    }

    public function isActive(Request $request,$id)
    {
        $get_is_active = HelloCM::where('id',$id)->value('is_active');
        $isactive = HelloCM::find($id);
        if($get_is_active == 0){
            $isactive->is_active = 1;
            // $notification = array(
            //     'alert-success' => $isactive->name.' is Active!',
            // );
        }
        else {
            $isactive->is_active = 0;
            // $notification = array(
            //     'alert-danger' => $isactive->name.' is inactive!',
            // );
        }
        if(!($isactive->update())){
            $notification = array(
                'error' => $isactive->name.' could not be changed!',
            );
        }
        return back()->withInput();
        // return back()->with($notification)->withInput();
    }
}
