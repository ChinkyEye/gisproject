<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use App\SurveyForm;
use App\SurveyFormHasAttribute;
use App\SurveyHasResult;



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
        return view ('web.survey.question',compact('datas'));
    }

    public function store(Request $request){
        // dd($request);
        // $answers = $request->answer;
        // $questions = $request->question;
        // foreach($answers as $key => $data){
        //     foreach($data as $key => $dat)
        //     {
        //         $datas = SurveyHasResult::create([
        //             'surveyform_has_user_id'=> "1",
        //             'surveyform_has_attr_id'=> $questions[$key],
        //             'result'=> $data,
        //             'date_np' => $this->helper->date_np_con_parm(date("Y-m-d")),
        //             'date' => date("Y-m-d"),
        //             'time' => date("H:i:s"),
        //             'created_by' => Auth::user()->id,
        //         ]);

        //     }
        // }
        // return redirect()->route('superadmin.galleryhasimage.index', $request->gallery_id)->with('alert-success', 'Data created succesffully!!!!');
    }
}
