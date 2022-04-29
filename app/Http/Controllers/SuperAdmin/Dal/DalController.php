<?php

namespace App\Http\Controllers\SuperAdmin\Dal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Dal;
use Auth;
use File;

class DalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Dal::orderBy('id','DESC')
                                    ->where('created_by', Auth::user()->id)
                                    ->paginate(20);
        return view('superadmin.dal.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('superadmin.dal.create');
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
        ]);
        

       $datas = Dal::create([
            'name' => $request['name'],
            'sort_id'=> '1',
            'date_np' => $this->helper->date_np_con_parm(date("Y-m-d")),
            'date' => date("Y-m-d"),
            'time' => date("H:i:s"),
            'created_by' => Auth::user()->id,
        ]);
        return redirect()->route('superadmin.dal.index')->with('alert-success', 'Data created succesffully!!!!');
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
        $datas = Dal::find($id);
        return view('superadmin.dal.edit', compact('datas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dal $dal)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);
        $all_data = $request->all();
        $all_data['updated_by'] = Auth::user()->id;
        if($dal->update($all_data))
        {
            return redirect()->route('superadmin.dal.index')->with('alert-success', 'Data updated succesffully!!!!');;
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
        $datas = Dal::find($id);
        $datas->delete();
        return response()->json([
            'success' => 'Record has been deleted successfully!'
        ]);
    }

    public function isActive(Request $request,$id)
    {
        $get_is_active = Dal::where('id',$id)->value('is_active');
        $isactive = Dal::find($id);
        if($get_is_active == 0){
            $isactive->is_active = 1;
            $notification = array(
                'alert-success' => $isactive->name.' is Active!',
            );
        }
        else {
            $isactive->is_active = 0;
            $notification = array(
                'alert-danger' => $isactive->name.' is inactive!',
            );
        }
        if(!($isactive->update())){
            $notification = array(
                'error' => $isactive->name.' could not be changed!',
            );
        }
        return back()->with($notification)->withInput();
    }


}
