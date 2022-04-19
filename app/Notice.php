<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Auth;

class Notice extends Model
{
   protected $fillable = [
         'title',
         'scroll',
         'type',
         'path',
         'document',
         'mimes_type',
         'description',
         'is_active',
         'date_np',
         'date',
         'time',
         'created_by',
         'updated_by',
    ];
    
    public function getUser()
    {
        return $this->belongsTo('App\User','created_by','id');
    }
    public static function totalnotice(Request $request){
        return Notice::orderBy('id','DESC')->where('scroll','1')->where('is_active','1')->take(10)->get();
    }
}
