<?php

class ProdiController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$jurusans = Jurusan::all();

		$prodis = DB::table('prodi')
		    ->join('jurusan', 'jurusan.id', '=', 'prodi.jurusan_id')
		    ->orderBy('nama_jurusan', 'asc')
		    ->get(array('prodi.*', 'jurusan.nama_jurusan'));

		return View::make('admin.prodi.index')
			->withJurusans($jurusans)
			->withProdis($prodis);
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
		Prodi::create($input);

		return Redirect::route('admin.prodi.index')
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
		$jurusans = Jurusan::all();
		$prodi = Prodi::findOrFail($id);

		return View::make('admin.prodi.edit')
			->withJurusans($jurusans)
			->withProdi($prodi);
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

		$prodi = Prodi::find($id);
		$prodi->update($input);

		return Redirect::route('admin.prodi.index')
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
		Prodi::find($id)->delete();

		return Redirect::route('admin.prodi.index')
			->with('successMessage', 'Berhasil Menghapus Data');
	}

	public function getProdi($id,$prodi_id)
	{
		$prodis = DB::table('prodi')
					->where('jurusan_id', $id)
					->get(array('prodi.*'));

		if($prodi_id=='1') {
			return View::make('admin.prodi.list-prodi')
				->withProdis($prodis);
		} elseif($prodi_id=='2') {
			return View::make('admin.prodi.list-prodi2')
				->withProdis($prodis);
		} elseif($prodi_id=='3') {
			return View::make('admin.prodi.list-prodi3')
				->withProdis($prodis);
		}
	}


}
