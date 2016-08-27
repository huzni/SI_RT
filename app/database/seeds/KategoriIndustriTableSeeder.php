<?php

class KategoriIndustriTableSeeder extends Seeder {

    public function run()
    {
        DB::table('kategori_industri')->delete();

        $data = [
        	['spesifikasi'=>'Android Programmer',
            'tags'=>'android, android studi, eclipse, sdk, java, xml',
            'kategori_id'=>'2','industri_id'=>'1',],

            ['spesifikasi'=>'IOS Programmer',
            'tags'=>'ios, macos',
            'kategori_id'=>'2','industri_id'=>'5',],

            ['spesifikasi'=>'Lavel',
            'tags'=>'compser, laravel, blade engine, mvc',
            'kategori_id'=>'4','industri_id'=>'1',],

            ['spesifikasi'=>'Lavel',
            'tags'=>'compser, laravel, blade engine, mvc',
            'kategori_id'=>'1','industri_id'=>'4',],
        ];

        DB::table('kategori_industri')->insert($data);
    }

}