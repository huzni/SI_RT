<?php

class KabupatenController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$provinsis = Provinsi::all();

		$kabupatens = DB::table('kabupaten')
		    ->join('provinsi', 'provinsi.id', '=', 'kabupaten.provinsi_id')
		    ->orderBy('nama_provinsi', 'asc')
		    ->orderBy('nama_kabupaten', 'asc')
		    ->get(array('kabupaten.*', 'provinsi.nama_provinsi'));

		return View::make('admin.kabupaten.index')
			->withProvinsis($provinsis)
			->withKabupatens($kabupatens);
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
		Kabupaten::create($input);

		return Redirect::route('admin.kabupaten.index')
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
		$provinsis = Provinsi::all();
		$kabupaten = Kabupaten::findOrFail($id);

		return View::make('admin.kabupaten.edit')
			->withProvinsis($provinsis)
			->withKabupaten($kabupaten);
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

		$kabupaten = Kabupaten::find($id);
		$kabupaten->update($input);

		return Redirect::route('admin.kabupaten.index')
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
		Kabupaten::find($id)->delete();

		return Redirect::route('admin.kabupaten.index')
			->with('successMessage', 'Berhasil Menghapus Data');
	}


	public function getKabupaten($id,$kabupaten_id)
	{
		$kabupatens = DB::table('kabupaten')
					->where('provinsi_id', $id)
					->get(array('kabupaten.*'));

		if($kabupaten_id=='1') {
			return View::make('admin.kabupaten.list-kabupaten')
				->withKabupatens($kabupatens);
		} else {
			return View::make('admin.kabupaten.list-kabupaten2')
				->withKabupatens($kabupatens);
		}
	}

}
