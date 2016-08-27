<?php

class TestimoniTableSeeder extends Seeder {

    public function run()
    {
        DB::table('testimoni')->delete();

        $data = [
        	['testimoni'=>'industrinya keren cocok buat PI', 'mahasiswa_id'=>'1', 'industri_id'=>'1'],
        	['testimoni'=>'lingkungan industri kondusif', 'mahasiswa_id'=>'1', 'industri_id'=>'2'],
        	['testimoni'=>'karyawannya baik-baik', 'mahasiswa_id'=>'2', 'industri_id'=>'1'],
        	['testimoni'=>'banyak ilmu yang bisa diserap dari industri ini', 'mahasiswa_id'=>'3', 'industri_id'=>'1'],
        	['testimoni'=>'banyak teman-teman PI dari univ/smk lain', 'mahasiswa_id'=>'3', 'industri_id'=>'3'],
        ];

        DB::table('testimoni')->insert($data);
    }

}