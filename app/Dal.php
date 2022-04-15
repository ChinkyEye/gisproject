<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dal extends Model
{
    protected $fillable = [
        'name',
        'sort_id',
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
