<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Menu;
use App\ModelHasType;
use Auth;
use Response;


class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus  = Menu::orderBy('id','DESC')
                        ->where('created_by',Auth::user()->id)
                        ->where('parent_id','0')
                        ->with('getModelType')
                        ->paginate(50);
        return view('superadmin.menu.index', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $modelhastypes = ModelHasType::orderBy('id','ASC')
                                        ->where('created_by',Auth::user()->id)
                                        ->get();
        return view('superadmin.menu.create', compact('modelhastypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $this->validate($request, [
            'name' => 'required',
        ]);
        $is_main = $request->has('is_main');
        $menu = Menu::create([
            'name' => $request['name'],
            'model' => $request['model'],
            'link' => $request['link'],
            'is_main' => $is_main?'1':'0',
            'type' => $request['type'],
            'page' => $request['page'],
            'is_active' => '1',
            'date' => date("Y-m-d"),
            'date_np' => $this->helper->date_np_con_parm(date("Y-m-d")),
            'time' => date("H:i:s"),
            'created_by' => Auth::user()->id,
        ]);
        return redirect()->route('superadmin.menu.index')->with('alert-success', 'Menu created successfully!!!!');
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
        $menus = Menu::find($id);
        $modelhastypes = ModelHasType::orderBy('id','ASC')
                                        ->where('created_by',Auth::user()->id)
                                        ->get();
        return view('superadmin.menu.edit', compact('menus','modelhastypes'));
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
        $menus = Menu::find($id);
        $all_data = $request->all();
        $all_data['updated_by'] = Auth::user()->id;
        $menus->update($all_data);
        return redirect()->route('superadmin.menu.index')->with('alert-success', 'Menu updated successfully!!!!');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $menus = Menu::find($id);
        $menus->delete();
        return response()->json([
            'success' => 'Record has been deleted successfully!'
        ]);

        // $menus = Menu::find($id);
        // if($menus->delete()){
        //     $notification = array(
        //       'message' => $menus->name.' is deleted successfully!',
        //       'status' => 'success'
        //   );
        // }else{
        //     $notification = array(
        //       'message' => $menus->name.' could not be deleted!',
        //       'status' => 'error'
        //   );
        // }
        // return Response::json($notification);
    }

    public function isActive(Request $request,$id)
    {
        $get_is_active = Menu::where('id',$id)->value('is_active');
        $isactive = Menu::find($id);
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
