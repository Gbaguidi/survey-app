<?php

namespace App\Http\Controllers;

use App\Models\Survey;
use App\Models\TakeSurvey;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SurveyController extends Controller
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

    /**
     * Show list of people who attend the survey.
     *
     * @return \Illuminate\Http\Response
     */
    public function showAllAttendees($id)
    {
        $survey=Survey::where('id',$id)->first();
        return view('controlPanel.surveyAnswers',compact('survey'));
    }

    /**
     * Show answer of one people.
     *
     * @return \Illuminate\Http\Response
     */
    public function showAnswer($id)
    {
        $takeSurvey=TakeSurvey::where('id',$id)->first();
        return view('controlPanel.answers',compact('takeSurvey'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('controlPanel.createSurvey');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Survey::create([
            'user_id'=> Auth::user()->id,
            'title'=> $request->title,
            'description'=> $request->description
        ]);
        dd('hello');
        return redirect('/home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $survey=Survey::where('id',$id)->first();
        return view('controlPanel.surveyDetails',compact('survey'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $survey=Survey::where('id',$id)->first();
        return view('controlPanel.editSurvey',compact('survey'));
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
        $survey=Survey::where('id',$id)->firstOrFail();
        $survey->title=$request->title;
        $survey->description=$request->description;
        $survey->save();
        return redirect('/home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Survey::where('id', $id)->delete();
        return redirect('/home');
    }
}
