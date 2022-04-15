<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ContactUs;
use Auth;


class ContactUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contactus = ContactUs::orderBy('id','DESC')
                                ->where('created_by', Auth::user()->id)
                                ->get();
        return view('superadmin.contactus.index',compact('contactus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('superadmin.contactus.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $this->validate($request, [
        //     'iframe' => 'required',
        //     'address' => 'required',
        //     'email' => 'required|email',
        // ]);

        $contactus = ContactUs::create([
            'iframe' => $request['iframe'],
            'address' => $request['address'],
            'email'=> $request['email'],
            'phone'=> $request['phone'],
            'date_np' => $this->helper->date_np_con_parm(date("Y-m-d")),
            'date' => date("Y-m-d"),
            'time' => date("H:i:s"),
            'created_by' => Auth::user()->id,
        ]);
        return redirect()->route('superadmin.contactus.index')->with('alert-success', 'data created succesffully!!!');;
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
        $datas = ContactUs::find($id);
        return view('superadmin.contactus.edit', compact('datas'));
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
        $contactus = ContactUs::find($id);
        $all_data = $request->all();
        $all_data['updated_by'] = Auth::user()->id;
        if($contactus->update($all_data))
        {
            return redirect()->route('superadmin.contactus.index')->with('alert-success', 'Data updated succesffully!!!!');;
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
        $datas = ContactUs::find($id);
        $datas->delete();
        return response()->json([
            'success' => 'Record has been deleted successfully!'
        ]);
    }

    public function isActive(Request $request,$id)
    {
        $get_is_active = ContactUs::where('id',$id)->value('is_active');
        $isactive = ContactUs::find($id);
        if($get_is_active == 0){
            $isactive->is_active = 1;
            // $notification = array(
            //     'alert-success' => $isactive->name.' is Active!',
            // );
        }
        else {
            $isactive->is_active = 0;
            // $notification = array(
            //     'alert-danger' => $isactive->name.' is inactive!',
            // );
        }
        if(!($isactive->update())){
            $notification = array(
                'error' => $isactive->name.' could not be changed!',
            );
        }
        return back()->withInput();
        // return back()->with($notification)->withInput();
    }
}
