<?php

class Mahasiswa extends Eloquent {

	protected $table = 'mahasiswa';

	protected $guarded = array('id');

	protected $fillable = array('nim', 'nama_mahasiswa', 'jenis_kelamin',
				'alamat','password','foto', 'prodi_id');

}