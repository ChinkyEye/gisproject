<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $fillable = [
        'title',
        'sort_id',
        'is_active',
        'date_np',
        'date',
        'time',
        'created_by',
        'updated_by',
    ];

    public function imagecount()
    {
        return $this->hasMany('App\GalleryHasImage','gallery_id','id')->where('is_active','1');
    }
}
