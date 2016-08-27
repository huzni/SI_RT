<?php

class KategoriTableSeeder extends Seeder {

    public function run()
    {
        DB::table('kategori')->delete();

        $data = [
        	['nama_kategori'=>'Networking', 'prodi_id'=>'2'],
            ['nama_kategori'=>'Mobile Programming', 'prodi_id'=>'2'],
            ['nama_kategori'=>'Desktop Programming', 'prodi_id'=>'2'],
            ['nama_kategori'=>'Web Programming', 'prodi_id'=>'2'],
            ['nama_kategori'=>'Multimedia', 'prodi_id'=>'2'],
        ];

        DB::table('kategori')->insert($data);
    }

}