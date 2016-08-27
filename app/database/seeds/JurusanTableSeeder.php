<?php

class JurusanTableSeeder extends Seeder {

    public function run()
    {
        DB::table('jurusan')->delete();

        $jurusan = [
        	['nama_jurusan'=>'Slamet', 
            'no_ktp'=>'213213321123', 
            'jenis_kelamin'=>'Laki-Laki',
        	'tanggal_lahir'=>'12 Desember 1992',
            'tempat_lahir'=>'Bantul',
        	'golongan_darah'=>'B',
            'status_pekerjaan'=>'Sekolah Dasar',
            'alamat' => 'Sanggrahan'],
            ['nama_jurusan'=>'Paijo', 
            'no_ktp'=>'213213321122', 
            'jenis_kelamin'=>'Laki-Laki',
            'tanggal_lahir'=>'12 Desember 1992',
            'tempat_lahir'=>'Samarinda',
            'golongan_darah'=>'AB',
            'status_pekerjaan'=>'Swasta',
            'alamat' => 'Giwangan'],
            ['nama_jurusan'=>'Juminten', 
            'no_ktp'=>'213213321123', 
            'jenis_kelamin'=>'Perempuan',
            'tanggal_lahir'=>'12 Desember 1992',
            'tempat_lahir'=>'Lampung',
            'golongan_darah'=>'A',
            'status_pekerjaan'=>'Sekolah Dasar',
            'alamat' => 'Giwangan'],
            ['nama_jurusan'=>'Ucok', 
            'no_ktp'=>'213213321123', 
            'jenis_kelamin'=>'Laki-Laki',
            'tanggal_lahir'=>'12 Desember 1992',
            'tempat_lahir'=>'Bantul',
            'golongan_darah'=>'O',
            'status_pekerjaan'=>'Sekolah Dasar',
            'alamat' => 'Giwangan'],
        ];

        DB::table('jurusan')->insert($jurusan);
    }

}