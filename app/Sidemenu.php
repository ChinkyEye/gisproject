<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sidemenu extends Model
{
    protected $fillable = [
        'name',
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
}
