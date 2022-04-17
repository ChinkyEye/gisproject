<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mantralaya extends Model
{
    protected $fillable = [
        'path',
        'document',
        'mimes_types',
        'email',
        'name',
        'phone',
        'address',
        'link',
        'latitude',
        'longitude',
        'sort_id',
        'is_active',
        'date_np',
        'date',
        'time',
        'created_by',
        'updated_by',
    ];
}
