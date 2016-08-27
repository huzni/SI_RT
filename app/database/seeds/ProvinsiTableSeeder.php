<?php

class ProvinsiTableSeeder extends Seeder {

    public function run()
    {
        DB::table('provinsi')->delete();

        $data = [
        	['nama_provinsi'=>'Yogyakarta'],
        	['nama_provinsi'=>'Jawa Tengah'],
        	['nama_provinsi'=>'Jawa Barat'],
        	['nama_provinsi'=>'Jakarta']
        ];

        DB::table('provinsi')->insert($data);
    }

}