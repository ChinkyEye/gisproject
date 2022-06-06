<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TblRemoteCorePerson extends Model
{
    use HasFactory;

     protected $fillable = [
        'mantralaya_id',
        'server',
        'name',
        'image',
        'post',
        'url',
        'ministry',
        'phone',
        'is_top',
        'is_start',
        'date_np',
        'is_active',
        'sort_id',
        'created_by',
        'updated_by',
    ];
}
