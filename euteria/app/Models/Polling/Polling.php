<?php

namespace App\Models\Polling;

use Illuminate\Database\Eloquent\Model;

class Polling extends Model
{
    protected $table = 'pollings';
    protected $fillable = ['name','description','status'];

    public function polling_question()
    {
        return $this->hasMany('App\Models\Polling\PollingQuestion', 'polling_id');
    }

    public function getTotalAnswerAttribute()
    {
        return PollingAnswer::where('polling_id',$this->id)->count();
    }

    protected $appends = ['total_answer'];
}
