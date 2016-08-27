<?php

class Prodi extends Eloquent {

	protected $table = 'prodi';

	protected $guarded = array('id');

	protected $fillable = array('nama_prodi','jurusan_id');

}