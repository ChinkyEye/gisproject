<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\CorePerson;
use Auth;

class CorePersonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $corepersons = CorePerson::where('created_by', Auth::user()->id)
                                ->get();
        return view('superadmin.coreperson.index', compact('corepersons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('superadmin.coreperson.create');
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
            'address' => 'required',
            'email' => 'required|email',
            'phone' => 'required|digits_between:6,10',
            'type' => 'required',
        ]);
         
       $corepersons = CorePerson::create([
            'name' => $request['name'],
            'address' => $request['address'],
            'email'=> $request['email'],
            'phone'=> $request['phone'],
            'responsibility'=> $request['responsibility'],
            'type'=> $request['type'],
            'date_np' => $this->helper->date_np_con_parm(date("Y-m-d")),
            'date' => date("Y-m-d"),
            'time' => date("H:i:s"),
            'created_by' => Auth::user()->id,
        ]);
        return redirect()->route('superadmin.coreperson.index')->with('alert-success', 'data created succesffully!!!');;
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
        $corepersons = CorePerson::find($id);
        return view('superadmin.coreperson.edit', compact('corepersons'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CorePerson $coreperson)
    {
        $this->validate($request, [
            'name' => 'required',
            'address' => 'required',
            'email' => 'required|email',
        ]);
        $all_data = $request->all();
        $all_data['updated_by'] = Auth::user()->id;
        if($coreperson->update($all_data))
        {
            return redirect()->route('superadmin.coreperson.index')->with('alert-success', 'Data updated succesffully!!!');;
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
        $corepersons = CorePerson::find($id);
        $corepersons->delete();
        return response()->json([
            'success' => 'Record has been deleted successfully!'
        ]);

    }

    public function isActive(Request $request,$id)
    {
        $get_is_active = CorePerson::where('id',$id)->value('is_active');
        $isactive = CorePerson::find($id);
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
