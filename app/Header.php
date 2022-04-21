<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Auth;

class Header extends Model
{
	protected $fillable = [
      'name',
      'path',
      'document',
      'mimes_type',
      'slogan',
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
     public static function totalheader(Request $request){
        return Header::orderBy('id','DESC')->where('is_active','1')->get();
    }
}
