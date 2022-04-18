<?php

namespace App\Http\Controllers\SuperAdmin\SangathanSanrachana;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\SangathanSanrachana;
use Auth;
use File;

class SangathanSanrachanaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = SangathanSanrachana::orderBy('id','DESC')
                                    ->where('created_by', Auth::user()->id)
                                    ->paginate(10);
        return view('superadmin.sangathansanrachana.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('superadmin.sangathansanrachana.create');
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
        ]);
        $uppdf = $request->file('image');
        if($uppdf != ""){
            $this->validate($request, [
                'image' => 'required|mimes:jpg,jpeg|max:1024',
            ]);
            $destinationPath = 'images/sangathansanrachana/';
            $extension = $uppdf->getClientOriginalExtension();
            $fileName = md5(mt_rand()).'.'.$extension;
            $uppdf->move($destinationPath, $fileName);
            $file_path = $destinationPath.'/'.$fileName;

        }else{
            $fileName = Null;
        }
       $datas = SangathanSanrachana::create([
            'title' => $request['title'],
            'image'=> $fileName,
            'date_np' => $this->helper->date_np_con_parm(date("Y-m-d")),
            'date' => date("Y-m-d"),
            'time' => date("H:i:s"),
            'created_by' => Auth::user()->id,
        ]);
        return redirect()->route('superadmin.sangathansanrachana.index')->with('alert-success', 'Data created succesffully!!!!');
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
        $datas = SangathanSanrachana::find($id);
        return view('superadmin.sangathansanrachana.edit', compact('datas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SangathanSanrachana $sangathansanrachana)
    {
        $this->validate($request, [
            'title' => 'required',
        ]);
        $all_data = $request->all();
        $uppdf = $request->file('image');
        if($uppdf != ""){
            $this->validate($request, [
                'image' => 'required|mimes:jpg,jpeg|max:1024',
            ]);
            $destinationPath = 'images/sangathansanrachana/';
            $oldFilename = $destinationPath.'/'.$sangathansanrachana->image;

            $extension = $uppdf->getClientOriginalExtension();
            $name = $uppdf->getClientOriginalName();
            $fileName = $name.'.'.$extension;
            $uppdf->move($destinationPath, $fileName);
            $file_path = $destinationPath.'/'.$fileName;
            $all_data['image'] = $fileName;
            if(File::exists($oldFilename)) {
                File::delete($oldFilename);
            }
        }
        $all_data['updated_by'] = Auth::user()->id;
        if($sangathansanrachana->update($all_data))
        {
            return redirect()->route('superadmin.sangathansanrachana.index')->with('alert-success', 'Data updated succesffully!!!!');;
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
        $datas = SangathanSanrachana::find($id);
        $destinationPath = 'images/sangathansanrachana/';
        $oldFilename = $destinationPath.'/'.$datas->image;
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
        $get_is_active = SangathanSanrachana::where('id',$id)->value('is_active');
        $isactive = SangathanSanrachana::find($id);
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