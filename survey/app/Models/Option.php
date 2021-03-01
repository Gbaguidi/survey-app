<?php

namespace App\Models;

use App\Models\Question;
use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    //
    protected $fillable = [
        'question_id','value','text'
    ];

    public function question()
    {
        return $this->belongsTo(Question::class);
    }

}
