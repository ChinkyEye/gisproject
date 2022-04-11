<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;


class Sidemenu extends Model
{
    protected $fillable = [
        'name',
        'model',
        'link',
        'link_type',
        'page',
        'is_active',
        'date_np',
        'date',
        'time',
        'created_by',
        'updated_by'
    ];

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = ucwords($value);
    }

    public static function totalSidemenu(Request $request){
        return Sidemenu::orderBy('sort_id','ASC')->where('is_active', '1')->get();
    }
}
