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
        $datas = User::orderBy('id','DESC')
                            ->where('user_type','2')
                            ->where('created_by',Auth::user()->id)
                            ->with('getUserMantralaya')
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
        ]);
        $uppdf = $request->file('image');
        if($uppdf != ""){
            $this->validate($request, [
                'image' => 'required|mimes:jpg,jpeg',
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
            'link' => $request['link'],
            'prefix' => $request['prefix'],
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
        $datas = User::find($id);
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
        ]);

        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->phone = $request->phone;
        $user->update();

        $mantralayahasuser = MantralayaHasUser::where('user_id',$id)->first();
        $uppdf = $request->file('image');
        if($uppdf != ""){
            $this->validate($request, [
                'image' => 'required|mimes:jpg,jpeg',
            ]);
            $destinationPath = 'images/mantralaya/';
            $oldFilename = $destinationPath.'/'.$mantralayahasuser->document;

            $extension = $uppdf->getClientOriginalExtension();
            $name = $uppdf->getClientOriginalName();
            $mimes = $uppdf->getMimeType();
            $fileName = $name.'.'.$extension;
            $uppdf->move($destinationPath, $fileName);
            $file_path = $destinationPath.'/'.$fileName;
            $mantralayahasuser->document = $fileName;
            $mantralayahasuser->path = $destinationPath;
            $mantralayahasuser->mimes_type = $mimes;
            if(File::exists($oldFilename)) {
                File::delete($oldFilename);
            }
        }

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
        $mantralayahasuser = MantralayaHasUser::where('user_id',$id)->first();

        $destinationPath = 'images/mantralaya/';
        $oldFilename = $destinationPath.'/'.$mantralayahasuser->document;
        if($mantralayahasuser->delete()){
            if(File::exists($oldFilename)) {
                File::delete($oldFilename);
            }
        }
        $datas = User::find($id);
        $datas->delete();
        return response()->json([
            'success' => 'Record has been deleted successfully!'
        ]);
    }

    public function isActive(Request $request,$id)
    {
        $get_is_active = User::where('id',$id)->value('is_active');
        $isactive = User::find($id);
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
