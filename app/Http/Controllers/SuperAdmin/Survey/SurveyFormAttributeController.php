<?php

namespace App\Http\Controllers\SuperAdmin\Survey;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\SurveyFormHasAttribute;
use App\SurveyFormHasChoice;
use Auth;

class SurveyFormAttributeController extends Controller
{
    public function createSurveyFormAttribute($id)
    {
        // dd('kk');
        return view('superadmin.surveyformattribute.create',compact('id'));
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
        else{
            return view('superadmin.surveyformattribute.radio');

        }

    }

    public function store(Request $request)
    {
        // dd('hey');
        // $this->validate($request, [
        //     'title' => 'required',
        // ]);
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

        // $surveychoiceforms = SurveyFormHasChoice::create([
        //     'surveyform_has_attr_id' => $surveyforms->id,
        //     'choice' => $request->radioquestion,
        //     'is_active' => '1',
        //     'date' => date("Y-m-d"),
        //     'date_np' => $this->helper->date_np_con_parm(date("Y-m-d")),
        //     'time' => date("H:i:s"),
        //     'created_by' => Auth::user()->id,
        // ]);

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
