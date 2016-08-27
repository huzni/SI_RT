<?php

class KategoriController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$jurusans = Jurusan::all();
		
		$kategoris = DB::table('kategori')
		    ->join('prodi', 'prodi.id', '=', 'kategori.prodi_id')
		    ->orderBy('nama_prodi', 'asc')
		    ->orderBy('kategori.id', 'asc')
		    ->get(array('kategori.*', 'prodi.nama_prodi'));

		return View::make('admin.kategori.index')
			->withJurusans($jurusans)
			->withKategoris($kategoris);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$input['nama_kategori'] = strtolower($input['nama_kategori']);
		Kategori::create($input);


		return Redirect::route('admin.kategori.index')
			->with('successMessage', 'Berhasil Menambahkan Data Baru');
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$kategori = Kategori::find($id);
		$prodi = Prodi::find($kategori->prodi_id);

		$jurusans = Jurusan::all();

		$prodis = DB::table('prodi')
					->where('jurusan_id', $prodi->jurusan_id)
					->get(array('prodi.*'));

		return View::make('admin.kategori.edit')
			->withProdi($prodi)
			->withJurusans($jurusans)
			->withProdis($prodis)
			->withKategori($kategori);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$input = Input::all();
		$input['nama_kategori'] = strtolower($input['nama_kategori']);
		$kategori = Kategori::find($id);
		$kategori->update($input);

		return Redirect::route('admin.kategori.index')
			->with('successMessage', 'Berhasil Mengubah Data');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Kategori::find($id)->delete();

		return Redirect::route('admin.kategori.index')
			->with('successMessage', 'Berhasil Menghapus Data');
	}

	public function getKategori($id)
	{
		$kategoris = DB::table('kategori')
					->where('prodi_id', $id)
					->get(array('kategori.*'));

		return View::make('admin.kategori.list-kategori')
			->withKategoris($kategoris);
	}


}
