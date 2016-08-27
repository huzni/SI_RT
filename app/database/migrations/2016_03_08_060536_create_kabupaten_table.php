<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKabupatenTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('kabupaten', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('nama_kabupaten', 50);
			$table->integer('provinsi_id')->unsigned();
			$table->nullableTimestamps();
			$table->foreign('provinsi_id')
                ->references('id')->on('provinsi')
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
		Schema::drop('kabupaten');
	}

}
