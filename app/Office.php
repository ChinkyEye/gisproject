<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Office extends Model
{
    protected $fillable = [
         'name',
         'address',
         'website_link',
         'logo',
         'thumbnail',
         'pathlogo',
         'paththumbnail',
         'mimes_type',
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
