<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    //
    protected $fillable = [
        'survey_id','question','type'
    ];
    protected $with=['options'];

    public function options()
    {
        return $this->hasMany(Option::class);
    }

    public function survey()
    {
        return $this->belongsTo(Survey::class);
    }
}
