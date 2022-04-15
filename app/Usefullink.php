<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Usefullink extends Model
{
    protected $fillable = [
       'name',
       'website_link',
       'created_by',
       'is_active',
       'date_np',
       'date',
       'time',
    ];
    
    public function getUser()
    {
        return $this->belongsTo('App\User','created_by','id');
    }

    public static function totalusefullink(Request $request){
        return Usefullink::orderBy('id','ASC')->where('is_active', '1')->get();
    }
}
