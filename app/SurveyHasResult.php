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
        'answered_by',
        'sort_id',
        'is_active',
        'date_np',
        'date',
        'time',
        'created_by',
        'updated_by',
    ];

    public function getSurveyQuestions()
    {
        return $this->belongsTo('App\SurveyFormHasAttribute','surveyform_has_attr_id','id');
    }
}
