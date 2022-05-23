<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;


class TblRemoteNotice extends Model
{
    public static function totalnotice(Request $request){
        return TblRemoteNotice::orderBy('id','DESC')->where('is_scroll','1')->where('is_active','1')->take(10)->get();
    }
}
