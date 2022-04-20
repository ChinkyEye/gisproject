<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SurveyHasResult extends Model
{
    use HasFactory;

    protected $fillable = [
        'surveyform_has_user_id',
        'surveyform_has_attr_id',
        'result',
        'type',
        'sort_id',
        'is_active',
        'date_np',
        'date',
        'time',
        'created_by',
        'updated_by',
    ];
}
