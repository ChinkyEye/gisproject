<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Header extends Model
{
	protected $fillable = [
      'name',
      'path',
      'document',
      'mimes_types',
      'slogan',
      'is_active',
      'date_np',
      'date',
      'time',
      'created_by',
      'updated_by',
    ];

    public function getUser()
    {
        return $this->belongsTo('App\User','created_by','id');
    }
}
