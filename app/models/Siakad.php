<?php

class Siakad extends Eloquent {

	protected $table = 'siakad';

	protected $guarded = array('id');

	protected $fillable = array('nim', 'nama_mahasiswa', 'jenis_kelamin',
				'alamat','password','foto', 'prodi_id', 'ipk', 'jumlah_sks', 'status');

}