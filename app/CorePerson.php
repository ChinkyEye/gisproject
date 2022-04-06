<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CorePerson extends Model
{
    protected $fillable = [
        'name',
        'address',
        'email',
        'phone',
        'link',
        'responsibility',
        'type',
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
}
