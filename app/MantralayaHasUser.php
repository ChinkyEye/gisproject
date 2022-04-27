<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MantralayaHasUser extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'path',
        'document',
        'mimes_type',
        'link',
        'is_main',
        'is_local_level',
        'prefix',
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

    public function getUserDetail()
    {
        return $this->belongsTo('App\User','user_id','id');
    }
}
