<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $fillable = [
        'name',
        'path',
        'document',
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
