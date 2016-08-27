<?php

class Provinsi extends Eloquent {

	protected $table = 'provinsi';

	protected $guarded = array('id');

	protected $fillable = array('nama_provinsi');

}