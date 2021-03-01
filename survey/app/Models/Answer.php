<?php

namespace App\Models;

use App\Models\Question;
use App\Models\TakeSurvey;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    //
    protected $fillable = [
        'question_id','take_survey_id','response'
    ];

    protected $with = [
        'question'
    ];

    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    public function takeSurvey()
    {
        return $this->belongsTo(TakeSurvey::class);
    }
}
