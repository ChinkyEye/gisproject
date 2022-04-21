<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\SurveyForm;
use App\SurveyFormHasAttribute;
use App\SurveyFormHasUser;
use App\SurveyHasResult;
use App\SurveyFormHasChoice;
use Auth;
use Response;

class SurveyFormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = SurveyForm::orderBy('id','DESC')
                            ->where('created_by', Auth::user()->id)
                            ->with('getSurveyQuestion')
                            ->get();
        return view('user.surveyform.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.surveyform.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd('hello',$request);
        $this->validate($request, [
            'title' => 'required',
        ]);
        $surveyforms = SurveyForm::create([
            'title' => $request['title'],
            'slug' => mt_rand(11111,99999).date('Ymd'),
            'description' => $request['description'],
            'is_active' => '1',
            'date' => date("Y-m-d"),
            'date_np' => $this->helper->date_np_con_parm(date("Y-m-d")),
            'time' => date("H:i:s"),
            'created_by' => Auth::user()->id,
        ]);
        return redirect()->route('user.surveyform.index')->with('alert-success', 'Data added successfully!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $datas = SurveyFormHasAttribute::where('form_id',$id)->orderBy('sort_id','ASC')->get();
        return view('user.surveyform.show', compact('datas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $datas = SurveyForm::where('created_by', Auth::user()->id)->find($id);
        return view('user.surveyform.edit', compact('datas'));
    }

    public function getSurveyEdit(Request $request)
    {
        // dd($request);
        $id = $request->id;
        $val = $request->val;
        // dd($id,$request);
        $survey = SurveyFormHasAttribute::find($id);
        $survey->question = $val;
        if($survey->save()){
            $response = array(
                'status' => 'success',
                'msg' => 'Successfully Changed',
            );
        }else{
            $response = array(
                'status' => 'failure',
                'msg' => 'Change Unsuccessful',
            );
            }

        return Response::json($response);

        // dd($request);
        // $datas = SurveyForm::where('created_by', Auth::user()->id)->find($id);
        // return view('user.surveyform.edit', compact('datas'));
    }

    public function getSurveyChoiceEdit(Request $request)
    {
        // dd($request);
        $id = $request->id;
        $val = $request->val;
        // dd($id,$request);
        $surveychoice = SurveyFormHasChoice::find($id);
        $surveychoice->choice = $val;
        if($surveychoice->save()){
            $response = array(
                'status' => 'success',
                'msg' => 'Successfully Changed',
            );
        }else{
            $response = array(
                'status' => 'failure',
                'msg' => 'Change Unsuccessful',
            );
            }

        return Response::json($response);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SurveyForm $surveyform)
    {
        $this->validate($request, [
            'title' => 'required',
        ]);
        $all_data = $request->all();
        $all_data['updated_by'] = Auth::user()->id;
        if($surveyform->update($all_data))
        {
            return redirect()->route('user.surveyform.index')->with('alert-success', 'Data updated succesffully!!!!');;
        };
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $datas = SurveyForm::find($id);
        $datas->delete();
        return response()->json([
            'success' => 'Record has been deleted successfully!'
        ]);
    }

    public function deleteSurveyChoice($id)
    {
        $datas = SurveyFormHasChoice::find($id);
        $datas->delete();
        return response()->json([
            'success' => 'Record has been deleted successfully!'
        ]);
    }

    public function addSurveyChoice(Request $request)
    {
        // dd($request,'hello');
        // $this->validate($request, [
        //     'title' => 'required',
        // ]);
        $radiooption = $request->radiooption;
        $surveyformattr_id = $request->surveyformattr_id;
        // dd($request);

        // if($type == 'radio'){
            foreach($radiooption as $key=>$value){
                $surveychoiceforms = SurveyFormHasChoice::create([
                    'surveyform_has_attr_id' => $surveyformattr_id,
                    'choice' => $radiooption[$key],
                    'is_active' => '1',
                    'date' => date("Y-m-d"),
                    'date_np' => $this->helper->date_np_con_parm(date("Y-m-d")),
                    'time' => date("H:i:s"),
                    'created_by' => Auth::user()->id,
                ]);
            }
        // }

        return redirect()->back()->with('alert-success', 'Data added successfully!!');
      
    }

    public function isActive(Request $request,$id)
    {
        $get_is_active = SurveyForm::where('id',$id)->value('is_active');
        $isactive = SurveyForm::find($id);
        if($get_is_active == 0){
            $isactive->is_active = 1;
            // $notification = array(
            //     'alert-success' => $isactive->name.' is Active!',
            // );
        }
        else {
            $isactive->is_active = 0;
            // $notification = array(
            //     'alert-danger' => $isactive->name.' is inactive!',
            // );
        }
        if(!($isactive->update())){
            $notification = array(
                'error' => $isactive->name.' could not be changed!',
            );
        }
        return back()->withInput();
        // return back()->with($notification)->withInput();
    }

    public function isActiveQuestion(Request $request,$id)
    {
        $get_is_active = SurveyFormHasAttribute::where('id',$id)->value('is_active');
        $isactive = SurveyFormHasAttribute::find($id);
        if($get_is_active == 0){
            $isactive->is_active = 1;
            // $notification = array(
            //     'alert-success' => $isactive->name.' is Active!',
            // );
        }
        else {
            $isactive->is_active = 0;
            // $notification = array(
            //     'alert-danger' => $isactive->name.' is inactive!',
            // );
        }
        if(!($isactive->update())){
            $notification = array(
                'error' => $isactive->name.' could not be changed!',
            );
        }
        return back()->withInput();
        // return back()->with($notification)->withInput();
    }

    public function getsurveyuser(Request $request,$slug)
    {
        $survey_id = SurveyForm::where('slug',$slug)->value('id');
        $survey_datas = SurveyForm::where('slug',$slug)->first();
        $datas = SurveyFormHasUser::where('surveyform_id',$survey_id)->get();
        return view('user.surveyform.surveyuser', compact('datas','survey_datas'));

    }

    public function getSurveyanswer(Request $request,$id)
    {
        // var_dump($id); die();
        $survey_users = SurveyFormHasUser::find($id);
        $datas = SurveyHasResult::where('surveyform_has_user_id',$id)
                                ->with('getSurveyQuestions')
                                ->get();
        return view('user.surveyform.surveyanswer', compact('datas','survey_users'));

    }

    public function survey_question(Request $request){
        $menu = SurveyFormHasAttribute::orderBy('sort_id','ASC')->get();
        $itemID = $request->itemID;
        $itemIndex = $request->itemIndex;
        // dd($request);
        foreach($menu as $value){
            return SurveyFormHasAttribute::where('id','=',$itemID)->update(array('sort_id'=> $itemIndex));
        }
    }


}
