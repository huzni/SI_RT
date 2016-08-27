<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMahasiswaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('mahasiswa', function(Blueprint $table)
		{
			$table->increments('id');
			$table->char('nim', 11);
			$table->string('nama_mahasiswa', 60);
			$table->enum('jenis_kelamin', array('Laki-laki', 'Perempuan'));
			$table->text('alamat');
			$table->text('foto');
			$table->char('password', 32);
			$table->integer('prodi_id')->unsigned();
			$table->nullableTimestamps();
			$table->foreign('prodi_id')
                ->references('id')->on('prodi')
                ->onUpdate('cascade')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('mahasiswa');
	}

}
