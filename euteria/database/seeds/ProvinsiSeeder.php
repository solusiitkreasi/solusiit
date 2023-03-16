<?php

use App\Models\Utility\Provinsi;
use Illuminate\Database\Seeder;

class ProvinsiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $provinsis = array(
            array('ms_provinsi_id' => '1','nama_provinsi' => 'Aceh ','show_item' => '1','created_at' => NULL,'updated_at' => NULL,'ms_negara_id' => '1'),
            array('ms_provinsi_id' => '2','nama_provinsi' => 'Sumatera Utara ','show_item' => '1','created_at' => NULL,'updated_at' => NULL,'ms_negara_id' => '1'),
            array('ms_provinsi_id' => '3','nama_provinsi' => 'Sumatera Barat ','show_item' => '1','created_at' => NULL,'updated_at' => NULL,'ms_negara_id' => '1'),
            array('ms_provinsi_id' => '4','nama_provinsi' => 'Riau ','show_item' => '1','created_at' => NULL,'updated_at' => NULL,'ms_negara_id' => '1'),
            array('ms_provinsi_id' => '5','nama_provinsi' => 'Jambi ','show_item' => '1','created_at' => NULL,'updated_at' => NULL,'ms_negara_id' => '1'),
            array('ms_provinsi_id' => '6','nama_provinsi' => 'Sumatera Selatan ','show_item' => '1','created_at' => NULL,'updated_at' => NULL,'ms_negara_id' => '1'),
            array('ms_provinsi_id' => '7','nama_provinsi' => 'Bengkulu ','show_item' => '1','created_at' => NULL,'updated_at' => NULL,'ms_negara_id' => '1'),
            array('ms_provinsi_id' => '8','nama_provinsi' => 'Lampung ','show_item' => '1','created_at' => NULL,'updated_at' => NULL,'ms_negara_id' => '1'),
            array('ms_provinsi_id' => '9','nama_provinsi' => 'Kepulauan Bangka Belitung','show_item' => '1','created_at' => NULL,'updated_at' => NULL,'ms_negara_id' => '1'),
            array('ms_provinsi_id' => '10','nama_provinsi' => 'Kepulauan Riau ','show_item' => '1','created_at' => NULL,'updated_at' => NULL,'ms_negara_id' => '1'),
            array('ms_provinsi_id' => '11','nama_provinsi' => 'DKI Jakarta','show_item' => '1','created_at' => NULL,'updated_at' => NULL,'ms_negara_id' => '1'),
            array('ms_provinsi_id' => '12','nama_provinsi' => 'Jawa Barat ','show_item' => '1','created_at' => NULL,'updated_at' => NULL,'ms_negara_id' => '1'),
            array('ms_provinsi_id' => '13','nama_provinsi' => 'Jawa Tengah ','show_item' => '1','created_at' => NULL,'updated_at' => NULL,'ms_negara_id' => '1'),
            array('ms_provinsi_id' => '14','nama_provinsi' => 'Daerah Istimewa Yogyakarta','show_item' => '1','created_at' => NULL,'updated_at' => NULL,'ms_negara_id' => '1'),
            array('ms_provinsi_id' => '15','nama_provinsi' => 'Jawa Timur ','show_item' => '1','created_at' => NULL,'updated_at' => NULL,'ms_negara_id' => '1'),
            array('ms_provinsi_id' => '16','nama_provinsi' => 'Banten ','show_item' => '1','created_at' => NULL,'updated_at' => NULL,'ms_negara_id' => '1'),
            array('ms_provinsi_id' => '17','nama_provinsi' => 'Bali ','show_item' => '1','created_at' => NULL,'updated_at' => NULL,'ms_negara_id' => '1'),
            array('ms_provinsi_id' => '18','nama_provinsi' => 'Nusa Tenggara Barat ','show_item' => '1','created_at' => NULL,'updated_at' => NULL,'ms_negara_id' => '1'),
            array('ms_provinsi_id' => '19','nama_provinsi' => 'Nusa Tenggara Timur ','show_item' => '1','created_at' => NULL,'updated_at' => NULL,'ms_negara_id' => '1'),
            array('ms_provinsi_id' => '20','nama_provinsi' => 'Kalimantan Barat','show_item' => '1','created_at' => NULL,'updated_at' => NULL,'ms_negara_id' => '1'),
            array('ms_provinsi_id' => '21','nama_provinsi' => 'Kalimantan Tengah ','show_item' => '1','created_at' => NULL,'updated_at' => NULL,'ms_negara_id' => '1'),
            array('ms_provinsi_id' => '22','nama_provinsi' => 'Kalimantan Selatan ','show_item' => '1','created_at' => NULL,'updated_at' => NULL,'ms_negara_id' => '1'),
            array('ms_provinsi_id' => '23','nama_provinsi' => 'Kalimantan Timur ','show_item' => '1','created_at' => NULL,'updated_at' => NULL,'ms_negara_id' => '1'),
            array('ms_provinsi_id' => '24','nama_provinsi' => 'Sulawesi Utara ','show_item' => '1','created_at' => NULL,'updated_at' => NULL,'ms_negara_id' => '1'),
            array('ms_provinsi_id' => '25','nama_provinsi' => 'Sulawesi Tengah ','show_item' => '1','created_at' => NULL,'updated_at' => NULL,'ms_negara_id' => '1'),
            array('ms_provinsi_id' => '26','nama_provinsi' => 'Sulawesi Selatan ','show_item' => '1','created_at' => NULL,'updated_at' => NULL,'ms_negara_id' => '1'),
            array('ms_provinsi_id' => '27','nama_provinsi' => 'Sulawesi Tenggara ','show_item' => '1','created_at' => NULL,'updated_at' => NULL,'ms_negara_id' => '1'),
            array('ms_provinsi_id' => '28','nama_provinsi' => 'Gorontalo ','show_item' => '1','created_at' => NULL,'updated_at' => NULL,'ms_negara_id' => '1'),
            array('ms_provinsi_id' => '29','nama_provinsi' => 'Sulawesi Barat ','show_item' => '1','created_at' => NULL,'updated_at' => NULL,'ms_negara_id' => '1'),
            array('ms_provinsi_id' => '30','nama_provinsi' => 'Maluku ','show_item' => '1','created_at' => NULL,'updated_at' => NULL,'ms_negara_id' => '1'),
            array('ms_provinsi_id' => '31','nama_provinsi' => 'Maluku Utara ','show_item' => '1','created_at' => NULL,'updated_at' => NULL,'ms_negara_id' => '1'),
            array('ms_provinsi_id' => '32','nama_provinsi' => 'Papua ','show_item' => '1','created_at' => NULL,'updated_at' => NULL,'ms_negara_id' => '1'),
            array('ms_provinsi_id' => '33','nama_provinsi' => 'Papua Barat ','show_item' => '1','created_at' => NULL,'updated_at' => NULL,'ms_negara_id' => '1'),
            array('ms_provinsi_id' => '34','nama_provinsi' => 'Kalimantan Utara','show_item' => '1','created_at' => NULL,'updated_at' => NULL,'ms_negara_id' => '1')
        );

        Provinsi::insert($provinsis);
          
    }
}
