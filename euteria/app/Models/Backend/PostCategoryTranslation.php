<?php

namespace App\Models\Backend;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class PostCategoryTranslation extends Model
{
    use Sluggable;
    use LogsActivity;

    protected $table = 'post_category_translations';
    protected $fillable = ['name','slug'];

    /* ACTIVITY LOG */
    protected static $logName = 'post_category_translations';
    protected static $logAttributes = ['name', 'slug'];

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
