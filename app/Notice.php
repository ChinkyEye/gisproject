<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
   protected $fillable = [
         'title',
         'path',
         'scroll',
         'type',
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
}
