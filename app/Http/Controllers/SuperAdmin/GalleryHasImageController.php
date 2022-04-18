<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\GalleryHasImage;
use Auth;
use File;

class GalleryHasImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $gallery_id = $id;
        $galleryhasimages = GalleryHasImage::where('gallery_id',$id)->get();
        return view('superadmin.galleryhasimage.index', compact('gallery_id','galleryhasimages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $gallery_id = $request->gallery_id;
        return view('superadmin.galleryhasimage.create', compact('gallery_id'));
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
            'image' => 'required',
        ]);
        $uppdfs = $request->file('image');
        foreach($uppdfs as $key => $uppdf){
            if($uppdf != ""){
                $this->validate($request, [
                    'image' => 'required',
                ]);
                $destinationPath = 'images/gallery/';
                $extension = $uppdf->getClientOriginalExtension();
                $fileName = md5(mt_rand()).'.'.$extension;
                $mimes = $uppdf->getMimeType();
                $uppdf->move($destinationPath, $fileName);
                $file_path = $destinationPath.'/'.$fileName;

            }else{
                $fileName = Null;
                $destinationPath = Null;
                $mimes = $mimes;
            }
            $datas = GalleryHasImage::create([
                'gallery_id'=> $request->gallery_id,
                'document'=> $fileName,
                'path'=> $destinationPath,
                'mimes_type'=> $mimes,
                'date_np' => $this->helper->date_np_con_parm(date("Y-m-d")),
                'date' => date("Y-m-d"),
                'time' => date("H:i:s"),
                'created_by' => Auth::user()->id,
            ]);
        }
        return redirect()->route('superadmin.galleryhasimage.index', $request->gallery_id)->with('alert-success', 'Data created succesffully!!!!');
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
        $datas = GalleryHasImage::find($id);
        $destinationPath = 'images/gallery/';
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
}
