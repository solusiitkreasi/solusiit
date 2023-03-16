<?php

namespace App\Models\Utility;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class TestimonyTranslation extends Model
{
    use LogsActivity;

    protected $table = 'testimony_translations';
    protected $fillable = ['description'];

    /* ACTIVITY LOG */
    protected static $logName = 'testimony_translations';
    protected static $logAttributes = ['image','name','slug'];
}
