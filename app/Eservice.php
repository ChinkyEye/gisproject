<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Eservice extends Model
{
     protected $fillable = [
        'name',
        'thumbnail',
        'logo',
        'paththumbnail',
        'pathlogo',
        'mimes_type',
        'karyalaya',
        'contact',
        'website_link',
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
}
