<?php

namespace App\Models\Auth;

use Laratrust\Models\LaratrustPermission;
use Laratrust\Traits\LaratrustPermissionTrait;

class Permission extends LaratrustPermission
{
    use LaratrustPermissionTrait;

    protected $fillable = [
        'name', 'display_name', 'description',
    ];

    public static function group()
    {
        return [
            'Dashboard','Setting','Brand','Category','Slider','User','Role','Permission','Menu','Post','Link','Product','Article','Reseller','Page','Feedback','Testimony'
        ];
    }

    public function scopeGetGroup($query, $group)
    {
        $query->where('name','like','%'.strtolower($group).'%');
    }

    
}
