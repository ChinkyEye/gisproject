<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IsthaniyaTaha extends Model
{
    use HasFactory;
    protected $fillable = [
	'metropolitan',
	'sub_metropolitan',
	'municipalities',
	'rural_municipalities',
	'forest_area',
	'population',
	'agricultural_land',
	'tourists_site',
	'electricity_dev',
	'district',
	'wada',
	'industries',
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
}
