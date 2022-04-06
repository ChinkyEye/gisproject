<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Misvision;
use App\User;
use Auth;
use Response;

class VisionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $visions = Misvision::orderBy('id','DESC')
                            ->where('type','2')
                            ->paginate(10);
       return view('superadmin.vision.index', compact('visions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('superadmin.vision.create');
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
            $missions = Misvision::create([
            'name' => $request['name'],
            'is_active' => '1',
            'type' => '2',
            'date' => date("Y-m-d"),
            'date_np' => $this->helper->date_np_con_parm(date("Y-m-d")),
            'time' => date("H:i:s"),
            'created_by' => Auth::user()->id,
        ]);
        return redirect()->route('superadmin.vision.index')->with('alert-success', 'Vision created succesffully!!!');
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
        $visions = Misvision::find($id); 
       return view('superadmin.vision.edit', compact('visions'));
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
          
        ]);
         $visions = Misvision::find($id);
        $all_data = $request->all();
        $all_data['updated_by'] = Auth::user()->id;
        $visions->update($all_data);
        return redirect()->route('superadmin.vision.index')->with('alert-success', 'Vision Updated succesffully!!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $visions = Misvision::find($id);
        if($visions->delete()){
            $notification = array(
                'message' => $visions->name.' is deleted successfully!',
                'status' => 'success'
            );
        }else{
            $notification = array(
                'message' => $mission->name.' could not be deleted!',
                'status' => 'error'
            );
        }
        return Response::json($notification);
    }
     
    public function isActive(Request $request,$id)
    {
        $get_is_active = Misvision::where('id',$id)->value('is_active');
        $isactive = Misvision::find($id);
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
