<?php

namespace App\Models;

use App\Models\Question;
use App\Models\TakeSurvey;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    //
    protected $fillable = [
        'user_id','title','description'
    ];
    protected $with=['questions'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function takeSurveys()
    {
        return $this->hasMany(TakeSurvey::class);
    }
}
