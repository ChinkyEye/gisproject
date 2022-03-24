<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MenuHasDropdown extends Model
{
    protected $fillable = [
        'dropdown_name','menu_id','is_active','date_np','date','time','created_by','updated_by'
    ];

    public function setNameAttribute($value)
    {
        $this->attributes['dropdown_name'] = ucwords($value);
    }
}
