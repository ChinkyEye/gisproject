<?php

namespace App\Http\Controllers\SuperAdmin\Survey;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\SurveyFormHasAttribute;
use App\SurveyFormHasChoice;
use App\SurveyForm;
use Auth;

class SurveyFormAttributeController extends Controller
{
    public function createSurveyFormAttribute($id)
    {
        // dd('kk');
        $find_survey = SurveyForm::find($id);
        // dd($find_survey);
        return view('superadmin.surveyformattribute.create',compact('id','find_survey'));
        //
    }

    public function getType(Request $request)
    {
        // dd('jj',$request);
        $type = $request->type;
        if($type == 'short')
        {
            return view('superadmin.surveyformattribute.short');
        }
        elseif($type == 'number'){
            return view('superadmin.surveyformattribute.number');
        }
        elseif($type == 'email'){
            return view('superadmin.surveyformattribute.email');
        }
        elseif($type == 'long'){
            return view('superadmin.surveyformattribute.long');
        }
        elseif($type == 'radio'){
            return view('superadmin.surveyformattribute.radio');
        }
        elseif($type == 'dropdown'){
            return view('superadmin.surveyformattribute.dropdown');
        }
        elseif($type == 'checkbox'){
            return view('superadmin.surveyformattribute.checkbox');
        }
        elseif($type == 'date'){
            return view('superadmin.surveyformattribute.date');
        }
        elseif($type == 'image'){
            return view('superadmin.surveyformattribute.image');
        }
        else{
            return view('superadmin.surveyformattribute.url');
        }

    }

    public function store(Request $request)
    {
        // dd('hey');
        // dd($request);
        $this->validate($request, [
            'question' => 'required',
            'type' => 'required',
        ]);
        // dd($request);
        $type = $request->type;
        $question = $request->question;
        $is_required = $request->is_required;
        // dd($is_required);
        if($is_required == 'on'){
            $is_required = '1';
        }
        else{
            $is_required = '0';
        }

        if($type == 'short'){
            $type = 'text';
        }

        if($type == 'long'){
            $type = 'textarea';
        }

        if($type == 'image'){
            $type = 'file';
        }



        $surveyforms = SurveyFormHasAttribute::create([
            'form_id' => $request['form_id'],
            'question' => $question,
            'type' => $type,
            'min' => $request->min,
            'max' => $request->max,
            'is_required' => $is_required,
            'is_active' => '1',
            'date' => date("Y-m-d"),
            'date_np' => $this->helper->date_np_con_parm(date("Y-m-d")),
            'time' => date("H:i:s"),
            'created_by' => Auth::user()->id,
        ]);

        $radiooption = $request->radiooption;
        $dropdownoption = $request->dropdownoption;
        $checkboxoption = $request->checkboxoption;
        // dd($radiooption);

        if($type == 'radio'){
            foreach($radiooption as $key=>$value){
                $surveychoiceforms = SurveyFormHasChoice::create([
                    'surveyform_has_attr_id' => $surveyforms->id,
                    'choice' => $radiooption[$key],
                    'is_active' => '1',
                    'date' => date("Y-m-d"),
                    'date_np' => $this->helper->date_np_con_parm(date("Y-m-d")),
                    'time' => date("H:i:s"),
                    'created_by' => Auth::user()->id,
                ]);
            }
        }

        if($type == 'dropdown'){
            foreach($dropdownoption as $key=>$value){
                $surveychoiceforms = SurveyFormHasChoice::create([
                    'surveyform_has_attr_id' => $surveyforms->id,
                    'choice' => $dropdownoption[$key],
                    'is_active' => '1',
                    'date' => date("Y-m-d"),
                    'date_np' => $this->helper->date_np_con_parm(date("Y-m-d")),
                    'time' => date("H:i:s"),
                    'created_by' => Auth::user()->id,
                ]);
            }
        }

        if($type == 'checkbox'){
            foreach($checkboxoption as $key=>$value){
                $surveychoiceforms = SurveyFormHasChoice::create([
                    'surveyform_has_attr_id' => $surveyforms->id,
                    'choice' => $checkboxoption[$key],
                    'is_active' => '1',
                    'date' => date("Y-m-d"),
                    'date_np' => $this->helper->date_np_con_parm(date("Y-m-d")),
                    'time' => date("H:i:s"),
                    'created_by' => Auth::user()->id,
                ]);
            }
        }



       

        // foreach($type as $key=>$value){

        //     $surveyforms = SurveyFormHasAttribute::create([
        //         'form_id' => $request['form_id'],
        //         'question' => $question[$key],
        //         'type' => $type[$key],
        //         'is_active' => '1',
        //         'date' => date("Y-m-d"),
        //         'date_np' => $this->helper->date_np_con_parm(date("Y-m-d")),
        //         'time' => date("H:i:s"),
        //         'created_by' => Auth::user()->id,
        //     ]);
        // }



       
        return redirect()->back()->with('alert-success', 'Data added successfully!!');
        // return redirect()->route('user.surveyform.index')->with('alert-success', 'Data added successfully!!');
    }
}
