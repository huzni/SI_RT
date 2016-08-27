<?php

class ProvinsiController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$provinsis = Provinsi::all();

		return View::make('admin.provinsi.index')
			->withProvinsis($provinsis);
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
		Provinsi::create($input);

		return Redirect::route('admin.provinsi.index')
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
		$provinsi = Provinsi::findOrFail($id);

		return View::make('admin.provinsi.edit')
			->withProvinsi($provinsi);
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

		$provinsi = Provinsi::find($id);
		$provinsi->update($input);

		return Redirect::route('admin.provinsi.index')
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
		Provinsi::find($id)->delete();

		return Redirect::route('admin.provinsi.index')
			->with('successMessage', 'Berhasil Menghapus Data');
	}


}
