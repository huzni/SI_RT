<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIndustriTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('industri', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('nama_industri', 70);
			$table->text('deskripsi');
			$table->text('alamat');
			$table->double('lat')->nullable();
			$table->double('lng')->nullable();
			$table->text('foto');
			$table->string('foto_url')->default('-');
			$table->text('foto_key')->nullable();
			$table->integer('jumlah_karyawan')->nullable;
			$table->integer('kabupaten_id')->unsigned();
			$table->nullableTimestamps();
			$table->foreign('kabupaten_id')
                ->references('id')->on('kabupaten')
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
		Schema::drop('industri');
	}

}
