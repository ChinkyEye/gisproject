<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GalleryHasImage extends Model
{
     protected $fillable = [
        'image',
        'gallery_id',
        'sort_id',
        'is_active',
        'date_np',
        'date',
        'time',
        'created_by',
        'updated_by',
    ];
}
