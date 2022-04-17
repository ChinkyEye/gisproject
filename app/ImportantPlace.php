<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImportantPlace extends Model
{
    protected $fillable = [
      'title',
      'path',
      'document',
      'mimes_types',
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
