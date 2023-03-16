<?php

namespace App\Models\Auth;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Laratrust\Traits\LaratrustUserTrait;
use Spatie\Activitylog\Traits\LogsActivity;

class User extends Authenticatable
{
    
    use LaratrustUserTrait;
    use Notifiable;

    use LogsActivity;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username', 'email', 'password',
    ];

    /* ACTIVITY LOG */
    protected static $logName = 'user';
    protected static $logAttributes = ['name', 'username','password'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getPermissionsAttribute()
    {
        $data = DB::select('SELECT permission_id, name, display_name, description
        FROM permission_user pu
        JOIN permissions p ON p.id = pu.permission_id
        WHERE user_id = '.$this->id);
        
        return $data;
    }

    protected $appends = ['permissions'];
}
