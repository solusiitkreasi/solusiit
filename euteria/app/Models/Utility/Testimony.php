<?php

namespace App\Models\Utility;

use Astrotomic\Translatable\Translatable;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;

class Testimony extends Model implements TranslatableContract
{
    use Sluggable;
    use LogsActivity;
    use Translatable;

    protected $table = 'testimonies';
    protected $fillable = ['image','name','slug','status'];

    /* TRANSLATABLE */
    protected $translatedAttributes = ['description'];

    /* ACTIVITY LOG */
    protected static $logName = 'testimonies';
    protected static $logAttributes = ['image','name','slug'];

    /* EXTENSION */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name',
                'onUpdate' => true
            ]
        ];
    }

}
