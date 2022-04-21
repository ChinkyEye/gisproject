<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mission extends Model
{
    use HasFactory;

    protected $fillable = [
		'title',
		'description',
		'created_by',
		'is_active',
		'date_np',
		'date',
		'time',
	];
}
