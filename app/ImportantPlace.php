<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImportantPlace extends Model
{
    protected $fillable = [
      'title',
      'image',
      'description',
      'longitude',
      'latitude',
      'sort_id',
      'is_active',
      'date_np',
      'date',
      'time',
      'created_by',
      'updated_by',
   ];
}
