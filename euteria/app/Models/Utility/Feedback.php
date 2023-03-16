<?php

namespace App\Models\Utility;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $table = 'feedback';
    protected $fillable = ['name','email','company','rate','opinion','status'];
    protected $dates = ['created_at'];

    public static function rate($key)
    {
        $data = [
            '1'=>'<span class="badge badge-danger">'.self::rate_text($key).'</span',
            '2'=>'<span class="badge badge-warning">'.self::rate_text($key).'</span',
            '3'=>'<span class="badge badge-success">'.self::rate_text($key).'</span',
        ];

        if($key == 0 || $key > 3)
        {
            return $data['1'];
        }

        return $data[$key];
    }

    public static function status($key)
    {
        $data = [
            '<span class="badge badge-success">New</span',
            '<span class="badge badge-secondary">Read</span'
        ];

        if($key == 0 || $key > 2)
        {
            return $data[0];
        }

        return $data[$key];
    }

    public static function rate_text($key)
    {
        $data = [
            '1'=>__('front.not_satisfied'),
            '2'=>__('front.average'),
            '3'=>__('front.really_satisfied'),
        ];

        if($key == 0 || $key > 3)
        {
            return $data['1'];
        }

        return $data[$key];
    }

    public static function NewFeedback()
    {
        return self::where('status',0)->orderBy('created_at','desc')->get();
    }
}
