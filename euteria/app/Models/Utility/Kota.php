<?php

namespace App\Models\Utility;

use Illuminate\Database\Eloquent\Model;

class Kota extends Model
{
    protected $table = 'kotas';
    // protected $fillable = [''];
    protected $primaryKey = 'ms_kota_id';

    public static function scopeList($query)
    {
        return $query->whereNotNull('ms_provinsi_id')->where('nama_kota','NOT LIKE', '%provinsi%');
    }
}
