<?php

namespace App\Http\Controllers\SuperAdmin\ApiMantri;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\PradeshSarkar;
use App\TblRemoteCorePerson;
use App\MantralayaHasUser;
use Auth;

class ApiMantriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = TblRemoteCorePerson::where('is_top','1')->orderBy('sort_id','ASC')->get();
        return view('superadmin.apimantri.index', compact('datas'));
    }

    public function apimantri_sort(Request $request)
    {
        // dd($request);
        $mantri = TblRemoteCorePerson::where('is_top','1')->orderBy('sort_id','ASC')->get();
        $itemID = $request->itemID;
        $itemIndex = $request->itemIndex;
        foreach($mantri as $value){
            return TblRemoteCorePerson::where('id','=',$itemID)->update(array('sort_id'=> $itemIndex));
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mantralayas = MantralayaHasUser::orderBy('sort_id','ASC')
                                        ->where('is_side','=','1')
                                        ->get();
        return view('superadmin.apimantri.create', compact('mantralayas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $mantralayahasuser = MantralayaHasUser::find($request->mantralaya_id);
        $ministry_name = $mantralayahasuser->getUserDetail->name;
        $uppdf = $request->file('image');
        if($uppdf != ""){
            $destinationPath = 'images/mantri/';
            $extension = $uppdf->getClientOriginalExtension();
            $fileName = md5(mt_rand()).'.'.$extension;
            $uppdf->move($destinationPath, $fileName);
            $file_path = $destinationPath.'/'.$fileName;

        }else{
            $fileName = Null;
        }
        $datas = TblRemoteCorePerson::create([
            'mantralaya_id' => '0',
            'server' => $mantralayahasuser->prefix == null ? '' : $mantralayahasuser->prefix ,
            'name' => $request['name'],
            'post' => $request['post'],
            'url' => $request['link'] == null ? '' : $request['link'] ,
            'ministry' => $ministry_name,
            'phone' => $request['phone'],
            'image'=> $fileName,
            'is_top' => '1',
            'is_start' => '0',
            'date_np' => $this->helper->date_np_con_parm(date("Y-m-d")),
        ]);
        return redirect()->route('superadmin.apimantri.index')->with('alert-success', 'Data created succesffully!!!!');
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
        //
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
        //
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
