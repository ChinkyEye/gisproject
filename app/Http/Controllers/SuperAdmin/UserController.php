<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use Auth;
use Response;

class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('user_type','2')
        ->get();
        return view('superadmin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('superadmin.user.create');
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
        'address' => 'required|unique:users',
        'email' => 'required|unique:users',
        'phone' => 'required|unique:users',
        'password' => 'required',
        'address' => 'required',
        'photo' => 'mimes:jpg,jpeg,png|max:1024',
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

    $users = User::create([
        'name' => $request['name'],
        'address' => $request['address'],
        'phone' => $request['phone'],
        'email' => $request['email'],
        'password' => Hash::make($request['password']),
        'image'=> $fileName,
        'is_active' => '1',
        'user_type' => '2',
        'date' => date("Y-m-d"),
        'date_np' => $this->helper->date_np_con_parm(date("Y-m-d")),
        'time' => date("H:i:s"),
        'created_by' => Auth::user()->id,
    ]);
    $pass = array(
      'message' => 'Data added successfully!',
      'alert-type' => 'success'
  );
    return redirect()->route('superadmin.user.index')->with($pass)->withInput();
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
       $users = User::find($id);
       return view('superadmin.user.edit', compact('users'));
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
     $users= User::find($id);

     $all_data = $request->all();
        // dd($all_data);
     $all_data['updated_by'] = Auth::user()->id;
     $users->update($all_data);
     $pass = array(
        'message' => 'Data updated successfully!',
        'alert-type' => 'success'
    );
     return redirect()->route('superadmin.user.index')->with($pass);
 }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $users = User::find($id);
       if($users->delete()){
        $notification = array(
          'message' => $users->name.' is deleted successfully!',
          'status' => 'success'
      );
    }else{
        $notification = array(
          'message' => $users->name.' could not be deleted!',
          'status' => 'error'
      );
    }
    return Response::json($notification);
}
public function isActive(Request $request,$id)
{
        // dd("milan");
    $get_is_active = User::where('id',$id)->value('is_active');
    $isactive = User::find($id);
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



//user password change

public function PasswordForm($id)
{
    $user = User::find($id);
    return view('superadmin.user.changepassword', compact('user'));
}

public function changePassword(Request $request, $id)
{

    $user = User::find($id);
    if (!(Hash::check($request->get('current-password'), $user->password))) {
            // The passwords matches
        return redirect()->back()->with("error","Your current password does not matches with the password you provided. Please try again.");
    }

    if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            //Current password and new password are same
        return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
    }

    $validatedData = $request->validate([
        'current-password' => 'required',
        'new-password' => 'required|string|min:6|confirmed',
    ]);

        //Change Password
    $user->password = bcrypt($request->get('new-password'));
    $user->save();

    return redirect()->back()->with("success","Password changed successfully !");

}
}
