<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKategoriTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('kategori', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('nama_kategori', 30);
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
		Schema::drop('kategori');
	}

}
