<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SurveyFormHasAttribute extends Model
{
    use HasFactory;

    protected $fillable = [
        'question',
        'type',
        'min',
        'max',
        'is_required',
        'form_id',
        'sort_id',
        'is_active',
        'date_np',
        'date',
        'time',
        'created_by',
        'updated_by',
    ];
}
