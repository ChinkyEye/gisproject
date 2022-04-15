<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Niti;
use App\ModelHasType;
use Auth;
use Response;
use File;

class NitiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nitis = Niti::orderBy('id','DESC')
                        ->where('created_by', Auth::user()->id)
                        ->paginate(10);
        return view('superadmin.niti.index', compact('nitis'));
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
        return view('superadmin.niti.create',compact('modelhastypes'));
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
            'description' => 'required',
        ]);
        $uppdf = $request->file('document');
        if($uppdf != ""){
            $this->validate($request, [
                'document' => 'required|mimes:pdf',               
            ]);

            $destinationPath = 'document/niti/';
            $extension = $uppdf->getClientOriginalExtension();
            $name = $uppdf->getClientOriginalName();
            $fileName = $name.'.'.$extension;
            $uppdf->move($destinationPath, $fileName);
            $file_path = $destinationPath.'/'.$fileName;

        }else{
            $fileName = Null;
            $destinationPath = Null;
        }
       $nitis = Niti::create([
            'title' => $request['title'],
            'description' => $request['description'],
            'type'=> $request['type'],
            'document'=> $fileName,
            'path'=> $destinationPath,
            'date_np' => $this->helper->date_np_con_parm(date("Y-m-d")),
            'date' => date("Y-m-d"),
            'time' => date("H:i:s"),
            'created_by' => Auth::user()->id,
        ]);
        return redirect()->route('superadmin.niti.index')->with('alert-success', 'niti created succesffully!!!!');

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
    public function edit(Request $request,$id)
    {
        $nitis = Niti::find($id);
        $modelhastypes = ModelHasType::orderBy('id','ASC')
                                    ->where('created_by', Auth::user()->id)
                                    ->where('model',$request->model)
                                    ->get();
        return view('superadmin.niti.edit', compact('nitis','modelhastypes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Niti $niti)
    {
        $this->validate($request, [
            'title' => 'required',
            'type' => 'required',
            'description' => 'required',
        ]);
       
        $all_data = $request->all();
        $uppdf = $request->file('document');
        if($uppdf != ""){
            $this->validate($request, [
                'document' => 'required|mimes:pdf',               
            ]);
            $destinationPath = 'document/niti/';
            $oldFilename = $destinationPath.'/'.$niti->document;

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
        if($niti->update($all_data))
        {
            return redirect()->route('superadmin.niti.index')->with('alert-success', 'data updated succesffully');;
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
        $nitis = Niti::find($id);

        $destinationPath = 'document/niti/';
        $oldFilename = $destinationPath.'/'.$nitis->document;

        if($nitis->delete()){
            if(File::exists($oldFilename)) {
                File::delete($oldFilename);
                // File::deleteDirectory($destinationPath);
            }
            $notification = array(
              'message' => $nitis->title.' is deleted successfully!',
              'status' => 'success'
          );
        }else{
            $notification = array(
              'message' => $nitis->title.' could not be deleted!',
              'status' => 'error'
          );
        }
        return Response::json($notification);
    }

    public function isActive(Request $request,$id)
    {
        $get_is_active = Niti::where('id',$id)->value('is_active');
        $isactive = Niti::find($id);
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

    public function downloadfile(Request $request,$file)
    {
        return response()->download(public_path('document/niti/'.$file));
    }

}
