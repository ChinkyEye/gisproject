<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Auth;

class Menu extends Model
{
    protected $fillable = [
        'name',
        'model',
        'link',
        'is_main',
        'type',
        'page',
        'parent_id',
        'is_active',
        'date_np',
        'date',
        'time',
        'created_by',
        'updated_by',
    ];

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = ucwords($value);
    }

    public static function totalMenu(Request $request){
        return Menu::orderBy('sort_id','ASC')->with('parent')->where('is_active', '1')->get();
    }

    public function getModelType()
    {
        return $this->belongsTo('App\ModelHasType','type','id');
    }

    public function getDropdown()
    {
        return $this->hasMany('App\MenuHasDropdown','menu_id','id');
    }

    public function parent()
    {
        return $this->hasMany('App\Menu','parent_id','id')->where('is_active','1');
    }
}
