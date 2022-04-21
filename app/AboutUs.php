<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Auth;

class AboutUs extends Model
{
    protected $fillable = [
        'title',
        'description',
        'path',
        'document',
        'mimes_type',
        'sort_id',
        'is_active',
        'date_np',
        'date',
        'time',
        'created_by',
        'updated_by',
    ];

     public static function totalaboutus(Request $request){
        return AboutUs::orderBy('id','DESC')->where('is_active','1')->get();
    }
}
