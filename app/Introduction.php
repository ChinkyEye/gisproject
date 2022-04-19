<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Introduction extends Model
{
     protected $fillable = [
       'title',
       'description',
       'path',
       'document',
       'mimes_type',
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
