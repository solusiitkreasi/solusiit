<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Slider extends Model
{
    use LogsActivity;

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->order = $model->make_order();            
        });
    }

    protected $table = 'sliders';
    protected $fillable = ['title','sub_title','link','images','order'];

    protected static $logName = 'sliders';
    protected static $logAttributes = ['title','sub_title','link','images','order'];

    /* PRIVATE FOR EVENT */
    private function make_order()
    {
        $data = self::orderBy('order','DESC')->first();
        if($data)
        {
            return $data->order+1;
        }
        return 1;
    }


}
