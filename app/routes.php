<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return Redirect::to('login');
});

Route::get('login', array('as' => 'auth.login-get', 'uses' => 'AuthController@showLogin'));
Route::post('login', array('as' => 'auth.login-post', 'uses' => 'AuthController@doLogin'));
Route::get('logout', array('as' => 'auth.logout', 'uses' => 'AuthController@doLogout'));

Route::group(array('prefix' => 'admin', 'before' => 'auth'), function()
{
	Route::get('dashboard', array('as' => 'admin.dashboard', 'uses' => 'HomeController@index'));

	Route::resource('jurusan', 'JurusanController');

	Route::resource('prodi', 'ProdiController');
	Route::get('getProdi/{id}/{prodi_id}', array('as' => 'admin.prodi.getProdi', 'uses' => 'ProdiController@getProdi'));

	Route::resource('mahasiswa', 'MahasiswaController');
	Route::get('/mahasiswa/reset/{id}', array('as' => 'admin.mahasiswa.reset', 'uses' => 'MahasiswaController@getReset'));

	Route::resource('provinsi', 'ProvinsiController');

	Route::resource('kabupaten', 'KabupatenController');
	Route::get('getKabupaten/{id}/{kabupaten_id}', array('as' => 'admin.kabupaten.getKabupaten', 'uses' => 'KabupatenController@getKabupaten'));

	Route::resource('kategori', 'KategoriController');
	Route::get('getKategori/{id}', array('as' => 'admin.kategori.getKategori', 'uses' => 'KategoriController@getKategori'));

	Route::resource('industri', 'IndustriController');

	Route::resource('kategori-industri', 'KategoriIndustriController');

	Route::resource('siakad', 'SiakadController');
	Route::get('tambahkan', array('as' => 'admin.siakad.tambahkan', 'uses' => 'SiakadController@getTambahkan'));
	
});


Route::group(array('prefix' => 'api'), function()
{
	Route::group(array('prefix' => 'jurusan'), function()
	{
		Route::get('list', array('uses' => 'APIJurusanController@getList'));
	
	});

	Route::group(array('prefix' => 'prodi'), function()
	{
		Route::get('list', array('uses' => 'APIProdiController@getList'));
	
	});

	Route::group(array('prefix' => 'mahasiswa'), function()
	{
		Route::post('login', array('uses' => 'MahasiswaController@loginMahasiswa'));
		Route::get('list', array('uses' => 'MahasiswaController@listMahasiswa'));
	});

	Route::group(array('prefix' => 'provinsi'), function()
	{
		Route::get('list', array('uses' => 'APIProvinsiController@getList'));
	});

	Route::group(array('prefix' => 'kabupaten'), function()
	{
		Route::get('list', array('uses' => 'APIKabupatenController@getList'));	
	});	

	Route::group(array('prefix' => 'kategori'), function()
	{
		Route::get('list', array('uses' => 'APIKategoriController@getList'));	
	});

	Route::group(array('prefix' => 'spesifikasi'), function()
	{
		Route::get('list', array('uses' => 'APISpesifikasiController@getList'));	
	});

	Route::group(array('prefix' => 'industri'), function()
	{
		Route::get('list', array('uses' => 'IndustriController@getIndustri'));
		Route::get('detail', 'IndustriController@getIndustriDetail');
		Route::post('like', 'IndustriController@like');
		Route::get('favorite', 'IndustriController@getFavorite');

		Route::post('unlike', 'IndustriController@unlike');

		Route::get('testimoni-short', 'APIIndustriController@getTestimoniShort');
		Route::get('testimoni', 'APIIndustriController@getTestimoni');
		Route::post('testimoni-post', 'APIIndustriController@postTestimoni');

		Route::get('cari', array('uses' => 'APIIndustriController@getCari'));
		Route::get('kategori-detail', 'IndustriController@getKategoriDetail');
	});
});