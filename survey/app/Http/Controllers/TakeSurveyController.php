<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Survey;
use App\Models\TakeSurvey;
use Illuminate\Http\Request;

class TakeSurveyController extends Controller
{
    //
    public function index(){
        $surveys=Survey::all();
        return view('site.survey',compact('surveys'));
    }

    public function show($id){
        $survey=Survey::where('id',$id)->first();
        return view('site.take-survey',compact('survey'));
    }

    public function store(Request $request){
        $checkIfExist=TakeSurvey::where('email',$request->get('email'))->first();
        if(is_null($checkIfExist)){
            $takeSurvey=TakeSurvey::create([
                'survey_id'=>$request->get('survey_id'),
                'email'=>$request->get('email'),
                ]);
            foreach($takeSurvey->survey->questions as $question){
                $input=$request->get($question->id);
                $answer=Answer::create([
                    'question_id'=>$question->id,
                    'take_survey_id'=>$takeSurvey->id,
                    'response'=>isset($input)?$request->get($question->id):'-'
                    ]);
                }
            $message="Your answer have been registered. Would you take another survey";
            $surveys=Survey::all();
            return view('site.survey',compact('surveys','message'));
        }
        else{
            $surveys=Survey::all();
            $message="Your have already attend this survey. Please take another survey?";
            return view('site.survey',compact('surveys','message'));
        }

    }
}
