<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserHasDetail extends Model
{
    protected $fillable = [
        'user_id','website_link','image','is_active','date_np','date','time','created_by','updated_by'
    ];
}
