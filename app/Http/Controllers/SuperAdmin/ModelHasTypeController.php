<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ModelHasType;
use Auth;

class ModelHasTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request,$type)
    {
        // dd($request,$type);
        $datas = ModelHasType::orderBy('id','DESC')
                                ->where('model',$type)
                                ->where('created_by', Auth::user()->id)
                                ->get();
        return view('superadmin.modelhastype.index', compact('datas','type'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($type)
    {
        return view('superadmin.modelhastype.create', compact('type'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request)
        $this->validate($request, [
            'type' => 'required',
        ]);
        $datas = ModelHasType::create([
            'model' => $request['model'],
            'type'=> $request['type'],
            'date_np' => $this->helper->date_np_con_parm(date("Y-m-d")),
            'date' => date("Y-m-d"),
            'time' => date("H:i:s"),
            'created_by' => Auth::user()->id,
        ]);
        return redirect()->route('superadmin.modelhastype.index',$request->model)->with('alert-success', 'Data created succesffully!!!!');
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
        $datas = ModelHasType::find($id);
        return view('superadmin.modelhastype.edit', compact('datas'));
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
        $datas = ModelHasType::find($id);
        $all_data = $request->all();
        $all_data['updated_by'] = Auth::user()->id;
        if($datas->update($all_data))
        {
            return redirect()->route('superadmin.modelhastype.index',$request->model)->with('alert-success', 'data updated succesffully');
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
}
