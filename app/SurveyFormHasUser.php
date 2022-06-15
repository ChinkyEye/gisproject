<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SurveyFormHasUser extends Model
{
    use HasFactory;

    protected $fillable = [
        'ip',
        'surveyform_id',
        'answered_by',
        'sort_id',
        'is_active',
        'date_np',
        'date',
        'time',
        'created_by',
        'updated_by',
    ];
    public function getSurveyName()
    {
        return $this->belongsTo('App\SurveyForm','surveyform_id','id');
    }

    public function getUserName()
    {
        return $this->belongsTo('App\User','answered_by','id');
    }
}
