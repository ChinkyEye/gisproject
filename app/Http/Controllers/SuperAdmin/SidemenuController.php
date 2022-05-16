<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Sidemenu;
use Auth;
use Response;

class SidemenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sidemenus = Sidemenu::orderBy('sort_id')
                            ->where('created_by', Auth::user()->id)
                            ->paginate(10);
        return view('superadmin.sidemenu.index', compact('sidemenus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('superadmin.sidemenu.create');
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
            'link' => 'required|unique:sidemenus',

        ]);
    
        $sidemenu = Sidemenu::create([
            'name' => $request['name'],
            'name_np' => $request['name_np'],
            'model' => $request['model'],
            'link' => $request['link'],
            'link_type' => strpos($request->link, "http") === 0 ? 1 : 0,
            'page' => $request['page'],
            'is_active' => '1',
            'date' => date("Y-m-d"),
            'date_np' => $this->helper->date_np_con_parm(date("Y-m-d")),
            'time' => date("H:i:s"),
            'created_by' => Auth::user()->id,
        ]);
        return redirect()->route('superadmin.sidemenu.index')->with('alert-success', 'Data added successfully');
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
        $sidemenus = Sidemenu::find($id);
        return view('superadmin.sidemenu.edit', compact('sidemenus'));
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
                'link' => 'required|unique:sidemenus,link,'.$id,
            ]); 
        }
        else{
            Null;
        }
        $sidemenus = Sidemenu::find($id);
        $all_data = $request->all();
        $all_data['link_type'] = strpos($request->link, "http") === 0 ? 1 : 0;
        $all_data['updated_by'] = Auth::user()->id;
        $sidemenus->update($all_data);
        return redirect()->route('superadmin.sidemenu.index')->with('alert-success', 'Data updated successfully');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sidemenus = Sidemenu::find($id);
        if($sidemenus->delete()){
            $notification = array(
              'message' => $sidemenus->name.' is deleted successfully!',
              'status' => 'success'
          );
        }else{
            $notification = array(
              'message' => $sidemenus->name.' could not be deleted!',
              'status' => 'error'
          );
        }
        return Response::json($notification);
    }

    public function isActive(Request $request,$id)
    {
        $get_is_active = Sidemenu::where('id',$id)->value('is_active');
        $isactive = Sidemenu::find($id);
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

    public function sortable_sidemenu(Request $request){
        $Sidemenu = Sidemenu::orderBy('sort_id','ASC')->get();
        $itemID = $request->itemID;
        $itemIndex = $request->itemIndex;
        foreach($Sidemenu as $value){
            return Sidemenu::where('id','=',$itemID)->update(array('sort_id'=> $itemIndex));
        }
    }
}
