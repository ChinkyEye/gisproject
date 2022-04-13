<?php

namespace App\Http\Controllers\SuperAdmin\Usefullink;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Usefullink;
use Auth;
use Response;
use File;

class UsefullinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $links = Usefullink::get();
       return view('superadmin.usefullink.index',compact('links'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('superadmin.usefullink.create');
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
            'website_link' => 'required',
          
        ]);
         $link = Usefullink::create([
            'name' => $request['name'],
            'website_link' => $request['website_link'],
            'is_active' => '1',
            'date_np' => $this->helper->date_np_con_parm(date("Y-m-d")),
            'date' => date("Y-m-d"),
            'time' => date("H:i:s"),
            'created_by' => Auth::user()->id,
        ]);
      
        return redirect()->route('superadmin.usefullink.index')->with('alert-success', 'Link added successfully');;
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
       $links = Usefullink::find($id);
       return view('superadmin.usefullink.edit', compact('links'));
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
        'name' => 'required',
        'website_link' => 'required',
        ]);
        $menus = Usefullink::find($id);
        $all_data = $request->all();
        $all_data['updated_by'] = Auth::user()->id;
        $menus->update($all_data);
        return redirect()->route('superadmin.usefullink.index')->with('alert-success', 'Usefullink updated successfully!!!!');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $links = Usefullink::find($id);
        $links->delete();
        return response()->json([
            'success' => 'Record has been deleted successfully!'
        ]);
    }
     public function isActive(Request $request,$id)
    {
        $get_is_active = Usefullink::where('id',$id)->value('is_active');
        $isactive = Usefullink::find($id);
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
