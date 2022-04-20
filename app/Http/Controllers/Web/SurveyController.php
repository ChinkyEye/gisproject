<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use App\SurveyForm;
use App\SurveyFormHasAttribute;
use App\SurveyHasResult;
use App\SurveyFormHasUser;
use Auth;



class SurveyController extends Controller
{
    public function index(Request $request)
    {
        $datas = SurveyForm::get();
        return view ('web.survey.index',compact('datas'));
    }

    public function getQuestion(Request $request, $slug)
    {
        $survey_id = SurveyForm::where('slug',$slug)->value('id');
        $datas = SurveyFormHasAttribute::where('form_id',$survey_id)->get();
        return view ('web.survey.question',compact('datas','survey_id'));
    }

    public function store(Request $request)
    {
        $imagefile = $request->file('image');
        $answers = $request->answer;
        $questions = $request->question;
        $checkbox = $request->checkbox;
        //for normal questions
        $surveyformhasusers = SurveyFormHasUser::create([
                    'ip'=> request()->ip(),
                    'surveyform_id'=> $request->survey_id,
                    'date_np' => $this->helper->date_np_con_parm(date("Y-m-d")),
                    'date' => date("Y-m-d"),
                    'time' => date("H:i:s"),
        ]);

        foreach($answers as $key => $data){
                $datas = SurveyHasResult::create([
                    'surveyform_has_user_id'=> $surveyformhasusers->id,
                    'surveyform_has_attr_id'=> $key,
                    'result'=> $data,
                    'date_np' => $this->helper->date_np_con_parm(date("Y-m-d")),
                    'date' => date("Y-m-d"),
                    'time' => date("H:i:s"),
                ]);
        }
        //for files
        if($imagefile)
        {
            foreach($imagefile as $key => $image){
                if($image != ""){
                    $destinationPath = 'images/answer/';
                    $extension = $image->getClientOriginalExtension();
                    $fileName = md5(mt_rand()).'.'.$extension;
                    $image->move($destinationPath, $fileName);
                    $file_path = $destinationPath.'/'.$fileName;

                }else{
                    $fileName = Null;
                }
                $datas = SurveyHasResult::create([
                    'surveyform_has_user_id'=> $surveyformhasusers->id,
                    'surveyform_has_attr_id'=> $key,
                    'result'=> $fileName,
                    'date_np' => $this->helper->date_np_con_parm(date("Y-m-d")),
                    'date' => date("Y-m-d"),
                    'time' => date("H:i:s"),
                ]);
            }

        }
        // for checkbox
        if($checkbox){
            foreach($checkbox as $key => $data){
                $id = $key;
                foreach($data as $key => $dat){
                    $datas = SurveyHasResult::create([
                        'surveyform_has_user_id'=> $surveyformhasusers->id,
                        'surveyform_has_attr_id'=> $id,
                        'result'=> $dat,
                        'date_np' => $this->helper->date_np_con_parm(date("Y-m-d")),
                        'date' => date("Y-m-d"),
                        'time' => date("H:i:s"),
                    ]);
                }
            }

        };
        return redirect()->route('web.survey.index')->with('alert-success', 'Data created succesffully!!!!');
    }
}
