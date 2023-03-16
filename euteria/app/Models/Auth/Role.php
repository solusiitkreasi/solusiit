<?php

namespace App\Models\Auth;

use Illuminate\Support\Facades\DB;
use Laratrust\Models\LaratrustRole;
use Laratrust\Traits\LaratrustRoleTrait;

class Role extends LaratrustRole
{
    use LaratrustRoleTrait;
    
    protected $fillable = [
        'name', 'display_name', 'description',
    ];


    public function getPermissionsAttribute()
    {
        $data = DB::select('SELECT permission_id, name, display_name, description
        FROM permission_role pr
        JOIN permissions p ON p.id = pr.permission_id
        WHERE role_id = '.$this->id);
        
        return $data;
    }

    protected $appends = ['permissions'];
}
