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
        'type_mimes',
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
    public function getSurveyChoice()
    {
        return $this->hasMany('App\SurveyFormHasChoice','surveyform_has_attr_id','id');
    }
}
