<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProdiTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('prodi', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('nama_prodi', 40);
			$table->integer('jurusan_id')->unsigned();
			$table->nullableTimestamps();
			$table->foreign('jurusan_id')
                ->references('id')->on('jurusan')
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
		Schema::drop('prodi');
	}

}
