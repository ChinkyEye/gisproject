<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SangathanSanrachana extends Model
{
    protected $fillable = [
        'title',
        'path',
        'image',
        'is_active',
        'date_np',
        'date',
        'time',
        'created_by',
        'updated_by',
    ];
}
