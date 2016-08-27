<?php

class Testimoni extends Eloquent {

	protected $table = 'testimoni';

	protected $guarded = array('id');

	protected $fillable = array('testimoni', 'mahasiswa_id', 'industri_id');

}