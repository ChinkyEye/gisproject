<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ModelHasType;
use App\Pratibedan;
use Auth;
use Response;
use File;


class PratibedanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pratibedans = Pratibedan::orderBy('id','DESC')
                        ->where('created_by', Auth::user()->id)
                        ->paginate(10);
        return view('superadmin.pratibedan.index', compact('pratibedans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $modelhastypes = ModelHasType::orderBy('id','ASC')
                                    ->where('created_by', Auth::user()->id)
                                    ->where('model',$request->model)
                                    ->get();
        return view('superadmin.pratibedan.create',compact('modelhastypes'));
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
            'title' => 'required',
            'type' => 'required',
        ]);
        $uppdf = $request->file('document');
        if($uppdf != ""){
            $this->validate($request, [
                'document' => 'required|mimes:pdf',               
            ]);

            $destinationPath = 'document/pratibedan/';
            $extension = $uppdf->getClientOriginalExtension();
            $name = $uppdf->getClientOriginalName();
            $mimes = $uppdf->getMimeType();
            $fileName = $name;
            $uppdf->move($destinationPath, $fileName);
            $file_path = $destinationPath.'/'.$fileName;

        }else{
            $fileName = Null;
            $destinationPath = Null;
            $mimes = Null;
        }
        $pratibedan = Pratibedan::create([
            'title' => $request['title'],
            'description' => $request['description'],
            'type'=> $request['type'],
            'document'=> $fileName,
            'path'=> $destinationPath,
            'mimes_type'=> $mimes,
            'date_np' => $this->helper->date_np_con_parm(date("Y-m-d")),
            'date' => date("Y-m-d"),
            'time' => date("H:i:s"),
            'created_by' => Auth::user()->id,
        ]);
        return redirect()->route('superadmin.pratibedan.index')->with('alert-success', 'Data created succesffully!!!!');
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
    public function edit(Request $request, $id)
    {
        $pratibedans = Pratibedan::find($id);
        $modelhastypes = ModelHasType::orderBy('id','ASC')
                                        ->where('model',$request->model)
                                        ->where('created_by',Auth::user()->id)
                                        ->get();
        return view('superadmin.pratibedan.edit', compact('pratibedans','modelhastypes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pratibedan $pratibedan)
    {
        $this->validate($request, [
            'title' => 'required',
            'type' => 'required',
        ]);
       
        $all_data = $request->all();
        $uppdf = $request->file('document');
        if($uppdf != ""){
            $this->validate($request, [
                'document' => 'required|mimes:pdf',               
            ]);
            $destinationPath = 'document/pratibedan/';
            $oldFilename = $destinationPath.'/'.$pratibedan->document;

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
        if($pratibedan->update($all_data))
        {
            return redirect()->route('superadmin.pratibedan.index')->with('alert-success', 'data updated succesffully');;
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
        $datas = Pratibedan::find($id);
        $destinationPath = 'document/pratibedan/';
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
        $get_is_active = Pratibedan::where('id',$id)->value('is_active');
        $isactive = Pratibedan::find($id);
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

    public function downloadfile(Request $request,$file)
    {
        return response()->download(public_path('document/pratibedan/'.$file));
    }
}
