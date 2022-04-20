<?php

namespace App\Http\Controllers\SuperAdmin\Survey;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\SurveyForm;
use Auth;

class SurveyFormController extends Controller
{
    public function index()
    {
        $datas = SurveyForm::orderBy('id','DESC')
                            ->where('created_by', Auth::user()->id)
                            ->get();
        return view('superadmin.surveyform.index', compact('datas'));
    }

    public function create()
    {
        return view('superadmin.surveyform.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
        ]);
        $surveyforms = SurveyForm::create([
            'title' => $request['title'],
            'description' => $request['description'],
            'is_active' => '1',
            'date' => date("Y-m-d"),
            'date_np' => $this->helper->date_np_con_parm(date("Y-m-d")),
            'time' => date("H:i:s"),
            'created_by' => Auth::user()->id,
        ]);
        return redirect()->route('superadmin.surveyform.index')->with('alert-success', 'Data added successfully!!');
    }
}
