<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FiscalYear extends Model
{
    protected $fillable = [
      'name',
      'is_active',
      'date_np',
      'date',
      'time',
      'created_by',
      'updated_by',
    ];
}
