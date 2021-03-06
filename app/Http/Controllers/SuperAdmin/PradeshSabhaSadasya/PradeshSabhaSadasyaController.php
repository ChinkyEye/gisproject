<?php

namespace App\Http\Controllers\SuperAdmin\PradeshSabhaSadasya;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\PradeshSabhaSadasya;
use App\Dal;
use Auth;
use File;

class PradeshSabhaSadasyaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = PradeshSabhaSadasya::orderBy('id','DESC')
                                    ->where('created_by', Auth::user()->id)
                                    ->with('getDal')
                                    ->paginate(50);
        return view('superadmin.pradeshsabhasadasya.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dals = Dal::where('is_active','1')->get();
        return view('superadmin.pradeshsabhasadasya.create',compact('dals'));
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
            'district' => 'required',
            'gender' => 'required',
            'dala' => 'required',
            'nirvachit_kshetra_no' => 'required',            
        ]);

        $number = $request['phone'];
        if($number != ""){
            $this->validate($request, [
                // 'phone' => 'required|digits_between:6,10',
                'image' => 'required',
                // 'image' => 'required|mimes:jpg,jpeg,png',
            ]); 
         }
            else{
                Null;
            }

        $uppdf = $request->file('image');
        if($uppdf != ""){
            $destinationPath = 'images/pradeshsabhasadasya/';
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

       $datas = PradeshSabhaSadasya::create([
            'name' => $request['name'],
            'district' => $request['district'],
            'gender' => $request['gender'],
            'dala' => $request['dala'],
            'nirvachit_kshetra_no' => $request['nirvachit_kshetra_no'],
            'phone' => $request['phone'],
            'document'=> $fileName,
            'path'=> $destinationPath,
            'mimes_type'=> $mimes,
            'date_np' => $this->helper->date_np_con_parm(date("Y-m-d")),
            'date' => date("Y-m-d"),
            'time' => date("H:i:s"),
            'created_by' => Auth::user()->id,
        ]);
        return redirect()->route('superadmin.pradeshsabhasadasya.index')->with('alert-success', 'Data created succesffully!!!!');
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
        $dals = Dal::where('is_active','1')->get();
        $datas = PradeshSabhaSadasya::find($id);
        return view('superadmin.pradeshsabhasadasya.edit', compact('datas','dals'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PradeshSabhaSadasya $pradeshsabhasadasya)
    {
        $this->validate($request, [
            'name' => 'required',
            'district' => 'required',
            'gender' => 'required',
            'dala' => 'required',
            'nirvachit_kshetra_no' => 'required',
        ]);
        $all_data = $request->all();
        $number = $request['phone'];
        if($number != ""){
            $this->validate($request, [
                'phone' => 'required|digits_between:6,10',
            ]); 
         }
            else{
                Null;
            }
        $uppdf = $request->file('image');
        if($uppdf != ""){
            $this->validate($request, [
                'image' => 'required|mimes:jpg,jpeg',
            ]);
            $destinationPath = 'images/pradeshsabhasadasya/';
            $oldFilename = $destinationPath.'/'.$pradeshsabhasadasya->document;

            $extension = $uppdf->getClientOriginalExtension();
            $name = $uppdf->getClientOriginalName();
            $fileName = $name.'.'.$extension;
            $uppdf->move($destinationPath, $fileName);
            $file_path = $destinationPath.'/'.$fileName;
            $all_data['document'] = $fileName;
            if(File::exists($oldFilename)) {
                File::delete($oldFilename);
            }
        }
        $all_data['updated_by'] = Auth::user()->id;
        if($pradeshsabhasadasya->update($all_data))
        {
            return redirect()->route('superadmin.pradeshsabhasadasya.index')->with('alert-success', 'Data updated succesffully!!!!');;
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
        $datas = PradeshSabhaSadasya::find($id);
        $destinationPath = 'images/pradeshsabhasadasya/';
        $oldFilename = $destinationPath.'/'.$datas->document;
        if($datas->delete()){
            if(File::exists($oldFilename)) {
                File::delete($oldFilename);
            }
        }
        return response()->json([
            'success' => 'Record has been deleted successfully!'
        ]);
    }

    public function isActive(Request $request,$id)
    {
        $get_is_active = PradeshSabhaSadasya::where('id',$id)->value('is_active');
        $isactive = PradeshSabhaSadasya::find($id);
        if($get_is_active == 0){
            $isactive->is_active = 1;
            $notification = array(
                'alert-success' => $isactive->name.' is Active!',
            );
        }
        else {
            $isactive->is_active = 0;
            $notification = array(
                'alert-danger' => $isactive->name.' is inactive!',
            );
        }
        if(!($isactive->update())){
            $notification = array(
                'error' => $isactive->name.' could not be changed!',
            );
        }
        return back()->with($notification)->withInput();
    }


}
