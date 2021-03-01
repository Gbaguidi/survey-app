<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Option;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class QuestionController extends Controller
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $survey_id=intval(substr(URL::previous(), -1));
        if ($survey_id==intval($request->get('survey_id'))) {
            $arrive = $request->get("entries");
            foreach ($arrive as $key => $value) {
                Question::create([
                    'question' => $value["question"],
                    'type' => $value["type"],
                    // 'required' => $value["required"],
                    'survey_id' => $survey_id,
                ]);
            }
            return redirect()->route('surveys.show', $survey_id);
        } else {
            return redirect()->back();
        }
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
        $question=Question::where('id',$id)->first();
        return view('controlPanel.editInput',compact('question'));
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
        $question=Question::where('id',$id)->firstOrFail();
        $question->question=$request->get("question");
        $question->save();
        return redirect()->route('surveys.show', $question->survey->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $question=Question::where('id',$id)->first();
        $survey_id=$question->survey->id;
        $question->delete();
        return redirect()->route('surveys.show', $survey_id);

    }
}
