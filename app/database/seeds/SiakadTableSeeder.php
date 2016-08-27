<?php

class SiakadTableSeeder extends Seeder {

    public function run()
    {
        DB::table('siakad')->delete();

        $data = [
        	['nama_mahasiswa'=>'Muhshin Riyadi', 'jenis_kelamin'=>'Laki-laki',
            'alamat'=>'Banguntapan Bantul', 'foto'=>'muhshin.jpg', 'password'=>md5('pwd'),
            'prodi_id'=>'2', 'nim'=>'13520241083', 'ipk'=>'3,62', 'jumlah_sks'=>'90'],
            ['nama_mahasiswa'=>'Pipit Ayudiawati', 'jenis_kelamin'=>'Perempuan',
            'alamat'=>'Lempuyangan Yogyakarta', 'foto'=>'pipit.jpg', 'password'=>md5('pwd'),
            'prodi_id'=>'2','nim'=>'13520241084', 'ipk'=>'3,62', 'jumlah_sks'=>'90'],
            ['nama_mahasiswa'=>'Wahid Ansor Aditya', 'jenis_kelamin'=>'Laki-laki',
            'alamat'=>'Nanggulan Kulon Progo', 'foto'=>'didit.jpg', 'password'=>md5('pwd'),
            'prodi_id'=>'2','nim'=>'13520241085', 'ipk'=>'3,40', 'jumlah_sks'=>'88'],
            ['nama_mahasiswa'=>'Lanang Yordy Base', 'jenis_kelamin'=>'Laki-laki',
            'alamat'=>'Lampung', 'foto'=>'yordy.jpg', 'password'=>md5('pwd'),
            'prodi_id'=>'2','nim'=>'13520241086', 'ipk'=>'3,30', 'jumlah_sks'=>'90'],
            ['nama_mahasiswa'=>'Della Amalia', 'jenis_kelamin'=>'Perempuan',
            'alamat'=>'Purworejo', 'foto'=>'della.jpg', 'password'=>md5('pwd'),
            'prodi_id'=>'2','nim'=>'13520241087', 'ipk'=>'3,51', 'jumlah_sks'=>'92'],
            ['nama_mahasiswa'=>'Rahardyan Bisma', 'jenis_kelamin'=>'Laki-laki',
            'alamat'=>'Bantul', 'foto'=>'-', 'password'=>md5('pwd'),
            'prodi_id'=>'2','nim'=>'13520244022', 'ipk'=>'3,72', 'jumlah_sks'=>'92'],
        ];

        DB::table('siakad')->insert($data);
    }

}