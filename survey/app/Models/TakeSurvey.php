<?php

namespace App\Models;

use App\Models\Answer;
use App\Models\Survey;
use Illuminate\Database\Eloquent\Model;

class TakeSurvey extends Model
{
    //
    protected $fillable = [
        'survey_id','email'
    ];
    protected $with=['answers','survey'];

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }
    public function survey()
    {
        return $this->belongsTo(Survey::class);
    }
}
