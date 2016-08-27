<?php

class KategoriIndustri extends Eloquent {

	protected $table = 'kategori_industri';

	protected $guarded = array('id');

	protected $fillable = array('spesifikasi','tags','kategori_id','industri_id');

}