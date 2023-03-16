<?php

namespace App\Models\Polling;

use Illuminate\Database\Eloquent\Model;

class PollingQuestion extends Model
{
    protected $table = 'polling_questions';
    protected $fillable = ['polling_id','description','status'];

    public function polling()
    {
        return $this->belongsTo('App\Models\Polling\Polling');
    }

    public function getAnswerCountAttribute()
    {
        return PollingAnswer::where('polling_question_id',$this->id)->count();
    }

    protected $appends = ['answer_count'];
}
