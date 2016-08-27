<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestimoniTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('testimoni', function(Blueprint $table)
		{
			$table->increments('id');
			$table->text('testimoni');
			$table->integer('mahasiswa_id')->unsigned();
			$table->integer('industri_id')->unsigned();
			$table->nullableTimestamps();
			$table->foreign('mahasiswa_id')
                ->references('id')->on('mahasiswa')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('industri_id')
                ->references('id')->on('industri')
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
		Schema::drop('testimoni');
	}

}
