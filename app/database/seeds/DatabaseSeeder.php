<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('UserTableSeeder');
		$this->call('JurusanTableSeeder');
		$this->call('ProdiTableSeeder');
		$this->call('MahasiswaTableSeeder');
		$this->call('ProvinsiTableSeeder');
		$this->call('KabupatenTableSeeder');
		$this->call('KategoriTableSeeder');
		$this->call('IndustriTableSeeder');
		$this->call('KategoriIndustriTableSeeder');
		$this->call('TestimoniTableSeeder');
		$this->call('SiakadTableSeeder');
	}

}
