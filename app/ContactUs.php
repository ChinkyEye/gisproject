<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Auth;

class ContactUs extends Model
{
    protected $fillable = [
        'iframe',
        'address',
        'email',
        'phone',
        'youtube',
        'facebook',
        'twitter',
        'sort_id',
        'is_active',
        'date_np',
        'date',
        'time',
        'created_by',
        'updated_by',
    ];
    public static function totalcontact(Request $request){
        return ContactUs::orderBy('id','DESC')->where('is_active','1')->get();
    }
}
