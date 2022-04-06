<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mantralaya extends Model
{
    protected $fillable = [
        'photo','email','name','phone','address','link','sort_id','is_active','date_np','date','time','created_by','updated_by'
    ];
}
