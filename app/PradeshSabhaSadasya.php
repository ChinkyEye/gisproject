<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PradeshSabhaSadasya extends Model
{
    protected $fillable = [
        'name',
        'district',
        'gender',
        'dala',
        'nirvachit_kshetra_no',
        'phone',
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

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = ucwords($value);
    }
    
    public function getUser()
    {
        return $this->belongsTo('App\User','created_by','id');
    }

    public function getDal()
    {
        return $this->belongsTo('App\Dal','dala','id');
    }
}
