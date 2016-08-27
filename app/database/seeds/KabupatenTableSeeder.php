<?php

class KabupatenTableSeeder extends Seeder {

    public function run()
    {
        DB::table('kabupaten')->delete();

        $data = [
        	['nama_kabupaten'=>'Sleman', 'provinsi_id'=>'1'],
            ['nama_kabupaten'=>'Kulon Progo', 'provinsi_id'=>'1'],
            ['nama_kabupaten'=>'Gunung Kidul', 'provinsi_id'=>'1'],
            ['nama_kabupaten'=>'Bantul', 'provinsi_id'=>'1'],
            ['nama_kabupaten'=>'Yogyakarta', 'provinsi_id'=>'1'],
            ['nama_kabupaten'=>'Magelang', 'provinsi_id'=>'2'],
            ['nama_kabupaten'=>'Purworejo', 'provinsi_id'=>'2'],
        ];

        DB::table('kabupaten')->insert($data);
    }

}