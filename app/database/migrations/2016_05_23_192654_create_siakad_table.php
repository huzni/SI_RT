<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSiakadTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('siakad', function(Blueprint $table)
		{
			$table->increments('id');
			$table->char('nim', 11);
			$table->string('nama_mahasiswa', 60);
			$table->enum('jenis_kelamin', array('Laki-laki', 'Perempuan'));
			$table->text('alamat');
			$table->text('foto');
			$table->char('password', 32);
			$table->string('ipk', 5);
			$table->string('jumlah_sks', 3);
			$table->integer('prodi_id')->unsigned();
			$table->enum('status', array('yes', 'no'))->default('yes');
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
		Schema::drop('siakad');
	}

}
