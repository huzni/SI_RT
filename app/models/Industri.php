<?php
use Conner\Likeable\LikeableTrait;
class Industri extends Eloquent {
	use LikeableTrait;

	protected $table = 'industri';
	
	protected $guarded = array('id');
	
	protected $fillable = array('nama_industri','deskripsi','alamat',
		'lat','lng','foto','jumlah_karyawan','kabupaten_id', 'foto_url', 'foto_key');
}