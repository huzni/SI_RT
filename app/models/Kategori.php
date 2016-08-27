<?php

class Kategori extends Eloquent {

	protected $table = 'kategori';

	protected $guarded = array('id');

	protected $fillable = array('nama_kategori', 'prodi_id');

}