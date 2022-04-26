<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\CorePerson;
use App\ModelHasType;
use Auth;
use File;
use Response;

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
                                ->with('getCorepersonType')
                                ->get();
        return view('superadmin.coreperson.index', compact('corepersons'));
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
        return view('superadmin.coreperson.create', compact('modelhastypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $this->validate($request, [
            'name' => 'required',
            'address' => 'required',
            'email' => 'required|email',
            'phone' => 'required|digits_between:6,10',
            'type' => 'required',
            'is_top' => 'required',
        ]);
         $uppdf = $request->file('image');
          if($uppdf != ""){
            $this->validate($request, [
                'image' => 'required|mimes:jpg,png,jpeg',
            ]);
            $destinationPath = 'images/coreperson/';
            $extension = $uppdf->getClientOriginalExtension();
            $mimes = $uppdf->getMimeType();
            $fileName = md5(mt_rand()).'.'.$extension;
            $uppdf->move($destinationPath, $fileName);
            $file_path = $destinationPath.'/'.$fileName;

        }else{
            $fileName = Null;
            $destinationPath = Null;
            $extension = Null;
            $mimes = Null;
        }
        $corepersons = CorePerson::create([
            'name' => $request['name'],
            'address' => $request['address'],
            'email'=> $request['email'],
            'phone'=> $request['phone'],
            'link'=> $request['link'],
            'facebook' => $request['facebook'],
            'document'=> $fileName,
            'path'=> $destinationPath,
            'mimes_types'=> $extension,
            'mimes_type'=> $mimes,
            'responsibility'=> $request['responsibility'],
            'is_top' => $request['is_top'],
            'type'=> $request['type'],
            'date_np' => $this->helper->date_np_con_parm(date("Y-m-d")),
            'date' => date("Y-m-d"),
            'time' => date("H:i:s"),
            'created_by' => Auth::user()->id,
        ]);
        return redirect()->route('superadmin.coreperson.index')->with('alert-success', 'data created succesffully!!!');
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
        $corepersons = CorePerson::find($id);
        $modelhastypes = ModelHasType::orderBy('id','ASC')
                                    ->where('created_by', Auth::user()->id)
                                    ->where('model',$request->model)
                                    ->get();
        return view('superadmin.coreperson.edit', compact('corepersons','modelhastypes'));
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
            'address' => 'required',
            'email' => 'required|email',
            'phone' => 'required|digits_between:6,10',
            'type' => 'required',
            'is_top' => 'required',
        ]);
        $all_data = $request->all();
        $coreperson = CorePerson::find($id);
        $all_data = $request->all();
        $uppdf = $request->file('image');
        if($uppdf != ""){
            $this->validate($request, [
                'image' => 'required|mimes:jpg,jpeg,png',               
            ]);
            $destinationPath = 'images/coreperson/';
            $oldFilename = $destinationPath.'/'.$coreperson->document;

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
        $coreperson->update($all_data);
        $coreperson->update();
       
        return redirect()->route('superadmin.coreperson.index')->with('alert-success', 'Data updated successfully!!!!');
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
