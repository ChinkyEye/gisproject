<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SurveyFormHasChoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'surveyform_has_attr_id',
        'choice',
        'sort_id',
        'is_active',
        'date_np',
        'date',
        'time',
        'created_by',
        'updated_by',
    ];
}
