<?php

namespace App\Models\Utility;

use Illuminate\Database\Eloquent\Model;

class Provinsi extends Model
{
    protected $table = 'provinsis';
    // protected $fillable = [''];
    protected $primaryKey = 'ms_provinsi_id';
    
    public function kota()
    {
        return $this->hasMany(Kota::class, 'ms_provinsi_id', 'ms_provinsi_id');
    }
}
