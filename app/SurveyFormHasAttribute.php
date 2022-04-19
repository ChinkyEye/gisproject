<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SurveyFormHasAttribute extends Model
{
    use HasFactory;

    public function getSurveyChoice()
    {
        return $this->hasMany('App\SurveyFormHasChoice','surveyform_has_attr_id','id');
    }
}
