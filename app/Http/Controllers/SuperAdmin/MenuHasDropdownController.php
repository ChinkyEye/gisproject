<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Menu;
use App\MenuHasDropdown;
use App\ModelHasType;
use Auth;
use Response;



class MenuHasDropdownController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $menus = Menu::find($id);
        $menu_name = Menu::where('id',$id)->value('name');
        // $menuhasdropdowns = Menu::where('parent_id',$id)->paginate(10);
        $menuhasdropdowns = Menu::where('parent_id',$id)
                                    ->orderBy('sort_id')
                                    ->get();
                                    // dd($menuhasdropdowns);
        return view('superadmin.menuhasdropdown.index', compact('menus','menuhasdropdowns','menu_name'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $modelhastypes = ModelHasType::orderBy('id','ASC')
                                        ->where('created_by',Auth::user()->id)
                                        ->get();
        $menus = Menu::find($id);
        $menu_name = Menu::where('id',$id)->value('name');
        return view('superadmin.menuhasdropdown.create', compact('menus','modelhastypes','menu_name'));
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
            'name_np' => 'required',
        ]);
        $link = $request['link'];
        if($link != ""){
            $this->validate($request, [
                'link' => 'required|unique:menus',
            ]); 
        }
        else{
            Null;
        }
        $is_main = $request->has('is_main');
        $is_api = $request->has('is_api');

        $parent_link = Menu::where('id',$request->menu_id)->value('link');
        $menu = Menu::create([
            'name' => $request['name'],
            'name_np' => $request['name_np'],
            'model' => $request['model'],
            'link' => $parent_link.'/'.$request['link'],
            'is_quickmenu' => $request['is_quickmenu'],
            'is_api' => $is_api?'1':'0',
            'api_key' => $request['api_key'],
            'is_main' => $is_main?'1':'0',
            'type' => $request['type'] == null ? '1' : $request['type'],
            'page' => $request['page'],
            'parent_id' => $request['menu_id'],
            'level' => '2',
            'is_active' => '1',
            'date' => date("Y-m-d"),
            'date_np' => $this->helper->date_np_con_parm(date("Y-m-d")),
            'time' => date("H:i:s"),
            'created_by' => Auth::user()->id,
        ]);
        return redirect()->route('superadmin.menuhasdropdown.index',$request->menu_id)->with('alert-success', 'Menu created successfully!!!!');;
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
        $menu_value = Menu::where('id',$id)->first();
        $edit_value = Menu::where('id',$id)->value('name');
        $menuhasdropdowns = Menu::find($id);
        $modelhastypes = ModelHasType::orderBy('id','ASC')
                                        ->where('created_by',Auth::user()->id)
                                        ->get();
        return view('superadmin.menuhasdropdown.edit', compact('menuhasdropdowns','menu_value','modelhastypes','edit_value'));
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
            'name_np' => 'required',
        ]);
        $link = $request['link'];
        if($link != ""){
            $this->validate($request, [
                'link' => 'required|unique:menus,link,'.$id,
            ]); 
        }
        else{
            Null;
        }
        $menuhasdropdowns = Menu::find($id);
        $is_api = $request->has('is_api');

        $all_data = $request->all();
        $all_data['is_api'] = $is_api?'1':'0';
        $all_data['updated_by'] = Auth::user()->id;
        $menuhasdropdowns->update($all_data);
        return redirect()->route('superadmin.menuhasdropdown.index',$request->menu_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $menuhasdropdowns = Menu::find($id);
        if($menuhasdropdowns->delete()){
            $notification = array(
              'message' => $menuhasdropdowns->name.' is deleted successfully!',
              'status' => 'success'
          );
        }else{
            $notification = array(
              'message' => $menuhasdropdowns->name.' could not be deleted!',
              'status' => 'error'
          );
        }
        return Response::json($notification);
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

    public function updateItems(Request $request)
    {
        $input = $request->all();
        
        if(!empty($input['pending']))
        {
            foreach ($input['pending'] as $key => $value) {
                $key = $key + 1;
                Menu::where('id',$value)
                        ->update([
                            'sort_id'=>$key
                        ]);
            }
        }
        return response()->json(['status'=>'success']);
    }


}
