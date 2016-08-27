<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJurusanTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('jurusan', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('nama_jurusan', 40);
			$table->string('no_ktp', 20);
			$table->string('alamat', 40);
			$table->enum('jenis_kelamin', array('Laki-Laki', 'Perempuan'));
			$table->string('tanggal_lahir', 20);
			$table->string('tempat_lahir', 15);
			$table->string('golongan_darah', 3);
			$table->string('status_pekerjaan', 20);
			$table->nullableTimestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('jurusan');
	}

}
