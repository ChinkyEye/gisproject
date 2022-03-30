<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\UserHasDetail;
use Auth;

class UserHasDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $datas = User::find($id);
        return view('user.userhasdetail.create', compact('datas'));
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
            'website_link' => 'required',
            'image' => 'required'
             ]);
         
        $uppdf = $request->file('image');
        if($uppdf != ""){
            $destinationPath = 'images/user/';
            $extension = $uppdf->getClientOriginalExtension();
            $fileName = md5(mt_rand()).'.'.$extension;
            $uppdf->move($destinationPath, $fileName);
            $file_path = $destinationPath.'/'.$fileName;

        }else{
            $fileName = Null;
        }
        $count = UserHasDetail::where('user_id',$request->user_id)->count();
        // dd($count);
        if($count == 0){
           $userhasdetail = UserHasDetail::create([

                'user_id' => $request['user_id'],
                'website_link' => $request['website_link'],
                'image'=> $fileName,
                'date_np' => $this->helper->date_np_con_parm(date("Y-m-d")),
                'date' => date("Y-m-d"),
                'time' => date("H:i:s"),
                'created_by' => Auth::user()->id,
            ]);
            return redirect()->route('user.home');  
        }
            return redirect()->route('user.home');  
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
