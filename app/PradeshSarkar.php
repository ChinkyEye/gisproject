<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PradeshSarkar extends Model
{
    protected $fillable = [
        'title',
        'description',
        'path',
        'document',
        'mimes_type',
        'sort_id',
        'is_active',
        'date_np',
        'date',
        'time',
        'created_by',
        'updated_by',
    ];
}
