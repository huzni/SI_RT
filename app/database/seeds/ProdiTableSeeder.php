<?php

class ProdiTableSeeder extends Seeder {

    public function run()
    {
        DB::table('prodi')->delete();

        $prodi = [
        	['nama_prodi'=>'Pendidikan Teknik Elektronika', 'jurusan_id'=>'1'],
        	['nama_prodi'=>'Pendidikan Teknik Informatika', 'jurusan_id'=>'1'],
        	['nama_prodi'=>'Teknik Elektronika', 'jurusan_id'=>'1']
        ];

        DB::table('prodi')->insert($prodi);
    }

}