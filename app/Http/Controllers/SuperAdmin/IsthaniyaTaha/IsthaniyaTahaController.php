<?php

namespace App\Http\Controllers\SuperAdmin\IsthaniyaTaha;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\IsthaniyaTaha;
use Auth;
use Response;
use File;

class IsthaniyaTahaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = IsthaniyaTaha::get();
        return view('superadmin.istaniyataha.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('superadmin.istaniyataha.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
       $datas = IsthaniyaTaha::create([
        'metropolitan' => $request['metropolitan'],
        'sub_metropolitan' => $request['sub_metropolitan'],
        'municipalities' => $request['municipalities'],
        'sub_metropolitan' => $request['sub_metropolitan'],
        'rural_municipalities' => $request['rural_municipalities'],
        'forest_area' => $request['forest_area'],
        'population' => $request['population'],
        'agricultural_land' => $request['agricultural_land'],
        'tourists_site' => $request['tourists_site'],
        'electricity_dev' => $request['electricity_dev'],
        'district' => $request['district'],
        'wada' => $request['wada'],
        'industries' => $request['industries'],
        'is_active' => '1',
        'date_np' => $this->helper->date_np_con_parm(date("Y-m-d")),
        'date' => date("Y-m-d"),
        'time' => date("H:i:s"),
        'created_by' => Auth::user()->id,
    ]);
       
       return redirect()->route('superadmin.istaniyataha.index')->with('alert-success', 'Link added successfully');;
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
        $datas = IsthaniyaTaha::find($id);
        return view('superadmin.istaniyataha.edit', compact('datas'));
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
        
     ]);
     $datas = IsthaniyaTaha::find($id);
     $all_data = $request->all();
     $all_data['updated_by'] = Auth::user()->id;
     if($datas->update($all_data))
     {
        return redirect()->route('superadmin.istaniyataha.index')->with('alert-success', 'Data updated succesffully!!!!');;
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
        $datas = IsthaniyaTaha::find($id);
        $datas->delete();
        return response()->json([
            'success' => 'Record has been deleted successfully!'
        ]);
    }
    public function isActive(Request $request,$id)
    {
        $get_is_active = IsthaniyaTaha::where('id',$id)->value('is_active');
        $isactive = IsthaniyaTaha::find($id);
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
