<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelHasType extends Model
{
    protected $fillable = [
        'model',
        'type',
        'is_active',
        'date_np',
        'date',
        'time',
        'created_by',
        'updated_by',
    ];
}
