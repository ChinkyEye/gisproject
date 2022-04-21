<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\SurveyFormHasAttribute;
use App\SurveyFormHasChoice;
use App\SurveyForm;
use Auth;

class SurveyFormAttributeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function createSurveyFormAttribute($id)
    {
        $find_survey = SurveyForm::find($id);
        // dd($find_survey);
        return view('user.surveyformattribute.create',compact('id','find_survey'));
    }

    public function getType(Request $request)
    {
        // dd('jj',$request);
        $type = $request->type;
        if($type == 'short')
        {
            return view('user.surveyformattribute.short');
        }
        elseif($type == 'number'){
            return view('user.surveyformattribute.number');
        }
        elseif($type == 'email'){
            return view('user.surveyformattribute.email');
        }
        elseif($type == 'long'){
            return view('user.surveyformattribute.long');
        }
        elseif($type == 'radio'){
            return view('user.surveyformattribute.radio');
        }
        elseif($type == 'dropdown'){
            return view('user.surveyformattribute.dropdown');
        }
        elseif($type == 'checkbox'){
            return view('user.surveyformattribute.checkbox');
        }
        elseif($type == 'date'){
            return view('user.surveyformattribute.date');
        }
        elseif($type == 'image'){
            return view('user.surveyformattribute.image');
        }
        else{
            return view('user.surveyformattribute.url');
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        // dd('hey',$request);
        // dd($request);
        $this->validate($request, [
            'question' => 'required',
            'type' => 'required',
        ]);
        // dd($request);
        $type = $request->type;
        $question = $request->question;
        $is_required = $request->is_required;
        $image = $request->image;
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
            $type_mimes = 'jpg';

        }

        if($type == 'date'){
            $type = 'date';
            $date = $request->date;
        }
        // dd($type,$type_mimes);

        $surveyforms = SurveyFormHasAttribute::create([
            'form_id' => $request['form_id'],
            'question' => $question,
            'type' => $type,
            'type_mimes' => ($type == 'image'?$type_mimes:null),
            'min' => $request->min,
            'max' => $request->max,
            'is_required' => $is_required,
            'is_active' => '1',
            'date' => ($type == 'date'?$request->date:date("Y-m-d")),
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
       
        return redirect()->back()->with('alert-success', 'Data added successfully!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        dd('hh');
        $datas = SurveyFormHasChoice::find($id);
        $datas->delete();
        return response()->json([
            'success' => 'Record has been deleted successfully!'
        ]);
    }
}
