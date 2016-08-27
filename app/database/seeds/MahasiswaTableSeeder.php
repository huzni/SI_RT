<?php

class MahasiswaTableSeeder extends Seeder {

    public function run()
    {
        DB::table('mahasiswa')->delete();

        $data = [
        	['nama_mahasiswa'=>'Muhshin Riyadi', 'jenis_kelamin'=>'Laki-laki',
            'alamat'=>'Banguntapan Bantul', 'foto'=>'muhshin.jpg', 'password'=>md5('pwd'),
            'prodi_id'=>'2', 'nim'=>'13520241083'],
            ['nama_mahasiswa'=>'Pipit Ayudiawati', 'jenis_kelamin'=>'Perempuan',
            'alamat'=>'Lempuyangan Yogyakarta', 'foto'=>'pipit.jpg', 'password'=>md5('pwd'),
            'prodi_id'=>'2','nim'=>'13520241084'],
            ['nama_mahasiswa'=>'Wahid Ansor Aditya', 'jenis_kelamin'=>'Laki-laki',
            'alamat'=>'Nanggulan Kulon Progo', 'foto'=>'didit.jpg', 'password'=>md5('pwd'),
            'prodi_id'=>'2','nim'=>'13520241085'],
            ['nama_mahasiswa'=>'Lanang Yordy Base', 'jenis_kelamin'=>'Laki-laki',
            'alamat'=>'Lampung', 'foto'=>'yordy.jpg', 'password'=>md5('pwd'),
            'prodi_id'=>'2','nim'=>'13520241086'],
            ['nama_mahasiswa'=>'Della Amalia', 'jenis_kelamin'=>'Perempuan',
            'alamat'=>'Purworejo', 'foto'=>'della.jpg', 'password'=>md5('pwd'),
            'prodi_id'=>'2','nim'=>'13520241087'],
            ['nama_mahasiswa'=>'Rahardyan Bisma', 'jenis_kelamin'=>'Laki-laki',
            'alamat'=>'Bantul', 'foto'=>'-', 'password'=>md5('pwd'),
            'prodi_id'=>'2','nim'=>'13520244022'],
        ];

        DB::table('mahasiswa')->insert($data);
    }

}