<?php

namespace App\Http\Controllers\SuperAdmin\Mantralaya;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Mantralaya;
use App\MantralayaHasUser;
use App\User;
use Auth;
use File;

class MantralayaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = MantralayaHasUser::orderBy('sort_id','ASC')
                            ->where('created_by',Auth::user()->id)
                            ->with('getUserDetail')
                            ->paginate();
        return view('superadmin.mantralaya.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('superadmin.mantralaya.create');
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
            'email' => 'required',
            'password' => 'required',
        ]);
        $uppdf = $request->file('image');
        if($uppdf != ""){
            $this->validate($request, [
                'image' => 'required|mimes:jpg,jpeg,png',
            ]);
            $destinationPath = 'images/mantralaya/';
            $extension = $uppdf->getClientOriginalExtension();
            $mimes = $uppdf->getMimeType();
            $fileName = md5(mt_rand()).'.'.$extension;
            $uppdf->move($destinationPath, $fileName);
            $file_path = $destinationPath.'/'.$fileName;

        }else{
            $fileName = Null;
            $destinationPath = Null;
            $mimes = Null;
        }
        
        $users = User::create([
            'name' => $request['name'],
            'address' => $request['address'],
            'phone' => $request['phone'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'is_active' => '1',
            'user_type' => '2',
            'date' => date("Y-m-d"),
            'date_np' => $this->helper->date_np_con_parm(date("Y-m-d")),
            'time' => date("H:i:s"),
            'created_by' => Auth::user()->id,
        ]);
        $datas = MantralayaHasUser::create([
            'user_id' => $users->id,
            'is_main' => $request['is_main'],
            'is_local_level' => $request['is_local_level'],
            'link' => $request['link'],
            'prefix' => $request['prefix'],
            'is_side'  => $request['is_side'],
            'sort_id' => $request['sort_id'],
            'document'=> $fileName,
            'path'=> $destinationPath,
            'mimes_type'=> $mimes,
            'latitude' => $request['latitude'],
            'longitude' => $request['longitude'],
            'date_np' => $this->helper->date_np_con_parm(date("Y-m-d")),
            'date' => date("Y-m-d"),
            'time' => date("H:i:s"),
            'created_by' => Auth::user()->id,
        ]);
        return redirect()->route('superadmin.mantralaya.index')->with('alert-success', 'Data created succesffully!!!!');
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
        $datas = MantralayaHasUser::find($id);
        return view('superadmin.mantralaya.edit', compact('datas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            // 'password' => 'required',
        ]);

        $user_id = MantralayaHasUser::where('id',$id)->value('user_id');

        $user = User::where('id',$user_id)->first();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->phone = $request->phone;
        $user->update();

        $mantralayahasuser = MantralayaHasUser::find($id);
        $uppdf = $request->file('image');
        if($uppdf != ""){
            $this->validate($request, [
                'image' => 'required|mimes:jpg,jpeg,png',
            ]);
            $destinationPath = 'images/mantralaya/';
            $oldFilename = $destinationPath.'/'.$mantralayahasuser->document;

            $extension = $uppdf->getClientOriginalExtension();
            $name = $uppdf->getClientOriginalName();
            $mimes = $uppdf->getMimeType();
            $fileName = md5(mt_rand()).'.'.$extension;
            
            // $fileName = $name.'.'.$extension;
            $uppdf->move($destinationPath, $fileName);
            $file_path = $destinationPath.'/'.$fileName;
            $mantralayahasuser->document = $fileName;
            $mantralayahasuser->path = $destinationPath;
            $mantralayahasuser->mimes_type = $mimes;
            if(File::exists($oldFilename)) {
                File::delete($oldFilename);
            }
        }

        $mantralayahasuser->is_main = $request->is_main;
        $mantralayahasuser->is_local_level = $request->is_local_level;
        $mantralayahasuser->sort_id = $request->sort_id;
        $mantralayahasuser->is_side = $request->is_side;
        $mantralayahasuser->link = $request->link;
        $mantralayahasuser->prefix = $request->prefix;
        $mantralayahasuser->latitude = $request->latitude;
        $mantralayahasuser->longitude = $request->longitude;
        $mantralayahasuser->updated_by = Auth::user()->id;

        if($mantralayahasuser->update())
        {
            return redirect()->route('superadmin.mantralaya.index')->with('alert-success', 'Data updated succesffully!!!!');;
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
        $user_id = MantralayaHasUser::where('id',$id)->value('user_id');
        $mantralayahasuser = MantralayaHasUser::find($id);

        $destinationPath = 'images/mantralaya/';
        $oldFilename = $destinationPath.'/'.$mantralayahasuser->document;
        if($mantralayahasuser->delete()){
            if(File::exists($oldFilename)) {
                File::delete($oldFilename);
            }
        }
        $datas = User::where('id',$user_id)->first();
        $datas->delete();
        return response()->json([
            'success' => 'Record has been deleted successfully!'
        ]);
    }

    public function isActive(Request $request,$id)
    {
        $get_is_active = MantralayaHasUser::where('id',$id)->value('is_active');
        $isactive = MantralayaHasUser::find($id);
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

    public function PasswordForm($id)
    {
        $user = User::find($id);
        return view('superadmin.mantralaya.changepassword', compact('user'));
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

        return redirect()->back()->with('alert-success', 'Password changed successfully!!!!'); 

    }

    public function order_directories(Request $request){
        $datas = MantralayaHasUser::orderBy('sort_id','ASC')->get();
        $itemID = $request->itemID;
        $itemIndex = $request->itemIndex;
        foreach($datas as $value){
            return MantralayaHasUser::where('id','=',$itemID)->update(array('sort_id'=> $itemIndex));
        }
    }
}
