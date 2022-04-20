<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use App\MantralayaHasUser;



class MantralayaController extends Controller
{
    public function index(Request $request){
        $datas = MantralayaHasUser::get();
        return view('web.mantralaya.index', compact('datas'));
    }

    public function show(Request $request, $id)
    {
        $data = MantralayaHasUser::find($id);
        return view('web.mantralaya.detail', compact('data'));
    }
}
