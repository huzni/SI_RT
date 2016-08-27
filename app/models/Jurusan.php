<?php

class Jurusan extends Eloquent {

	protected $table = 'jurusan';

	protected $guarded = array('id');

	protected $fillable = array('nama_jurusan', 'no_ktp', 'alamat', 'jenis_kelamin', 'tanggal_lahir', 'tempat_lahir', 'golongan_darah', 'status_pekerjaan');

}