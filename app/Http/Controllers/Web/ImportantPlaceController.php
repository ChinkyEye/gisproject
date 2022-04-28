<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ImportantPlace;

class ImportantPlaceController extends Controller
{
    public function importantplacedetail(Request $request, $id)
    {
        $datas = ImportantPlace::select('id','title','description','longitude', 'latitude')->find($id);
        return view('web.importantplace-detail', [
            'datas' => $datas
        ]); 
            
    }

}
