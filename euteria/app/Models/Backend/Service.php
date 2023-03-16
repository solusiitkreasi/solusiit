<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table = 'services';
    protected $fillable = ['name','images','locale'];

    public function getLocaleNameAttribute()
    {
        $data = self::find($this->id);
        if($data->locale)
        {
            $locale = json_decode($data->locale,true);
            return $locale['name'][config('app.locale')];
        }
        return '-';
    }

    protected $appends = ['locale_name'];
}
