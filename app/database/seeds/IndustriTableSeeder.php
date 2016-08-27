<?php

class IndustriTableSeeder extends Seeder {

    public function run()
    {
        DB::table('industri')->delete();

        $data = [
        	['nama_industri'=>'Qiscus', 'deskripsi'=>'Qiscus adalah',
            'alamat'=>'Jl Petung 24 Sleman Yogyakarta',
            'lat'=>'123','lng'=>'456',
            'foto'=>'qiscus.jpg','jumlah_karyawan'=>'29',
             'kabupaten_id'=>'1'],
            ['nama_industri'=>'RRI Jogja', 'deskripsi'=>'RRI adalah satu-satunya radio yang menyandang nama negara yang siarannya ditujukan untuk kepentingan bangsa dan negara',
            'alamat'=>'JJln. Ahmad Jazuli No.4 Kotabaru
',
            'lat'=>'-7.7791815','lng'=>'110.3790238',
            'foto'=>'pmct.jpg','jumlah_karyawan'=>'35',
             'kabupaten_id'=>'1'],
             ['nama_industri'=>'Dinas Perizinan Kota Yogyakarta
', 'deskripsi'=>'Merupakan dinas yang menangani menganai perizinan',
            'alamat'=>'Jl. Kenari No.56',
            'lat'=>'-7.799242','lng'=>'110.3890773',
            'foto'=>'pmct.jpg','jumlah_karyawan'=>'35',
             'kabupaten_id'=>'1'],
             ['nama_industri'=>'PPPPTK Seni dan Budaya
', 'deskripsi'=>'-',
            'alamat'=>'Jl. Kenari No.56',
            'lat'=>'-7.7005778','lng'=>'110.4253452',
            'foto'=>'pmct.jpg','jumlah_karyawan'=>'35',
             'kabupaten_id'=>'1'],
             ['nama_industri'=>'Onebit Media
', 'deskripsi'=>'merupakan perusahaan yang bergerak dalam bidang pengembangan software mobile maupun web',
            'alamat'=>'Perumahan Gejayan, Depok, Sleman ',
            'lat'=>'-7.7553975','lng'=>'110.3947323',
            'foto'=>'pmct.jpg','jumlah_karyawan'=>'35',
             'kabupaten_id'=>'1']
        ];

        DB::table('industri')->insert($data);
    }

}