<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Auth;

class CorePerson extends Model
{
    protected $fillable = [
        'name',
        'address',
        'email',
        'phone',
        'link',
        'facebook',
        'path',
        'document',
        'mimes_type',
        'responsibility',
        'type',
        'is_top',
        'is_active',
        'date_np',
        'date',
        'time',
        'created_by',
        'updated_by',
    ];

    // public function setNameAttribute($value)
    // {
    //     $this->attributes['name'] = ucwords($value);
    // }

    public function getCorepersonType()
    {
        return $this->belongsTo('App\ModelHasType','type','id');
    }
    public static function totalcoreperson(Request $request){
        return CorePerson::orderBy('id','DESC')->where('is_active','1')->get();
    }

}
