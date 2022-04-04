<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Notice;
use Auth;
use Response;
use File;


class NoticeController extends Controller
{
    /** 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $notices = Notice::orderBy('id','DESC')
                        ->where('created_by', Auth::user()->id)
                        ->paginate(10);
        return view('superadmin.notice.index', compact('notices')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('superadmin.notice.create');
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
            'document' => 'required',
        ]);
        if(!$request->document){
            $this->validate($request, [
                'document' => 'required|mimes:pdf',               
            ]);
        }
         
        $uppdf = $request->file('document');
        if($uppdf != ""){
            $destinationPath = 'document/notice/';
            $extension = $uppdf->getClientOriginalExtension();
            $name = $uppdf->getClientOriginalName();
            // $fileName = md5(mt_rand()).'.'.$extension;
            // $fileName = time().'.'.$extension;
            $fileName = $name.'.'.$extension;
            $uppdf->move($destinationPath, $fileName);
            $file_path = $destinationPath.'/'.$fileName;

        }else{
            $fileName = Null;
        }
       $notices = Notice::create([
            'title' => $request['title'],
            'description' => $request['description'],
            'type'=> $request['type'],
            'document'=> $fileName,
            'date_np' => $this->helper->date_np_con_parm(date("Y-m-d")),
            'date' => date("Y-m-d"),
            'time' => date("H:i:s"),
            'created_by' => Auth::user()->id,
        ]);
        return redirect()->route('superadmin.notice.index');
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
       $notices = Notice::find($id);
        return view('superadmin.notice.edit', compact('notices'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Notice $notice)
    {
        $this->validate($request, [
            'title' => 'required',
            'type' => 'required',
            'description' => 'required',
        ]);
       
        $all_data = $request->all();
        $uppdf = $request->file('document');
        if($uppdf != ""){
            $destinationPath = 'document/notice/';
            $oldFilename = $destinationPath.'/'.$notice->document;

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
        $notice->update($all_data);
        $notice->update();
        return redirect()->route('superadmin.notice.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $notices = Notice::find($id);

        $destinationPath = 'document/notice/';
        $oldFilename = $destinationPath.'/'.$notices->document;

        if($notices->delete()){
            if(File::exists($oldFilename)) {
                File::delete($oldFilename);
                // File::deleteDirectory($destinationPath);
            }
            $notification = array(
              'message' => $notices->name.' is deleted successfully!',
              'status' => 'success'
          );
        }else{
            $notification = array(
              'message' => $notices->name.' could not be deleted!',
              'status' => 'error'
          );
        }
        return Response::json($notification);
    }
      public function isActive(Request $request,$id)
    {
        $get_is_active = Notice::where('id',$id)->value('is_active');
        $isactive = Notice::find($id);
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
        return response()->download(public_path('document/notice/'.$file));
    }
}
