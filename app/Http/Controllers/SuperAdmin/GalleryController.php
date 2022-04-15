<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Gallery;
use Auth;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galleries = Gallery::orderBy('id','DESC')
                            ->where('created_by',Auth::user()->id)
                            ->withCount('imagecount')
                            ->get();
        return view('superadmin.gallery.index', compact('galleries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('superadmin.gallery.create');
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
        $gallery = Gallery::create([
            'title' => $request['title'],
            'is_active' => '1',
            'date' => date("Y-m-d"),
            'date_np' => $this->helper->date_np_con_parm(date("Y-m-d")),
            'time' => date("H:i:s"),
            'created_by' => Auth::user()->id,
        ]);
        return redirect()->route('superadmin.gallery.index')->with('alert-success', 'Data created successfully!!!!');
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
        $datas = Gallery::find($id);
        return view('superadmin.gallery.edit', compact('datas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gallery $gallery)
    {
        $this->validate($request, [
            'title' => 'required',
        ]);
        $all_data = $request->all();
        $all_data['updated_by'] = Auth::user()->id;
        if($gallery->update($all_data))
        {
            return redirect()->route('superadmin.gallery.index')->with('alert-success', 'Data updated succesffully!!!!');;
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
        //
    }

    public function isActive(Request $request,$id)
    {
        $get_is_active = Gallery::where('id',$id)->value('is_active');
        $isactive = Gallery::find($id);
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
