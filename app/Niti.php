<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Niti extends Model
{
    protected $fillable = [
        'title',
        'type',
        'path',
        'mimes_type',
        'document',
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
