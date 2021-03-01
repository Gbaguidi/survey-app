<?php

namespace App\Http\Controllers;

use App\Models\Option;
use Illuminate\Http\Request;

class OptionController extends Controller
{

    public function store(Request $request){
        $question_id=intval($request->get("question_id"));
        $options = $request->get("entries");
        foreach ($options as $key => $value) {
            Option::create([
                'value' => $value["value"],
                'text' => $value["text"],
                'question_id' => $question_id,
            ]);
        }
        return redirect()->route('questions.edit', $question_id);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $option=Option::where('id',$id)->first();
        return view('controlPanel.editOption',compact('option'));
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
        $option=Option::where('id',$id)->firstOrFail();
        $option->value=$request->get('value');
        $option->text=$request->get('text');
        $option->save();
        return redirect()->route('questions.edit', $option->question_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $option=Option::where('id',$id)->first();
        $question_id=$option->question->id;
        $option->delete();
        return redirect()->route('questions.edit', $question_id);
    }
}
