<?php

namespace App\Http\Controllers\SuperAdmin\ApiMantri;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\PradeshSarkar;
use App\TblRemoteCorePerson;

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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
