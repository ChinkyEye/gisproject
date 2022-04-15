<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HelloCM extends Model
{
   protected $fillable = [
      'thumbnail',
      'path',
      'email',
      'description',
      'link',
      'sort_id',
      'is_active',
      'date_np',
      'date',
      'time',
      'created_by',
      'updated_by',
   ];
}
