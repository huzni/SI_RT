<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKategoriIndustriTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('kategori_industri', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('spesifikasi', 40);
			$table->text('tags');
			$table->integer('kategori_id')->unsigned();
			$table->integer('industri_id')->unsigned();
			$table->nullableTimestamps();
			$table->foreign('kategori_id')
                ->references('id')->on('kategori')
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
		Schema::drop('kategori_industri');
	}

}
