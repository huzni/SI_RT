<?php

class Kabupaten extends Eloquent {

	protected $table = 'kabupaten';

	protected $guarded = array('id');

	protected $fillable = array('nama_kabupaten','provinsi_id');

}