<?php

namespace App\Models\Utility;

use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    protected $table = 'kecamatans';

    protected $primaryKey = 'ms_kecamatan_id';

    public function getMsProvinsiIdAttribute()
    {
        $data =  Kota::find($this->ms_kota_id);

        if($data)
        {
            return $data->ms_provinsi_id;
        }

        return 1;
    }

    protected $appends = ['ms_provinsi_id'];
}
