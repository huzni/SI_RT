<?php

class SiakadController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$jurusans = Jurusan::all();
		
		$siakads = DB::table('siakad')
		    ->join('prodi', 'prodi.id', '=', 'siakad.prodi_id')
		    ->orderBy('nama_prodi', 'asc')
		    ->orderBy('nim', 'asc')
		    ->get(array('siakad.*', 'prodi.nama_prodi'));

		return View::make('admin.siakad.index')
			->withJurusans($jurusans)
			->withSiakads($siakads);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$siakad = Siakad::where('status', 'yes')->count();
		return View::make('admin.siakad.add')
			->withSiakad($siakad);
	}

	public function getTambahkan()
	{
		$siakads = Siakad::where('status', 'yes')
				->get();

		foreach($siakads as $siakad) {
			$input['nim'] = $siakad->nim;
			$input['nama_mahasiswa'] = $siakad->nama_mahasiswa;
			$input['jenis_kelamin'] = $siakad->jenis_kelamin;
			$input['alamat'] = $siakad->alamat;
			$input['foto'] = $siakad->foto;
			$input['password'] = $siakad->password;
			$input['prodi_id'] = $siakad->prodi_id;

			Mahasiswa::create($input);
		}

		return Redirect::route('admin.mahasiswa.index')
			->with('successMessage', 'Berhasil Menambahkan Data Baru');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$data = [];

		if (Request::hasFile('foto')) {
			$data['result'] = Imageupload::upload(Request::file('foto'));
		}

		$input['foto'] = $data['result']['original_filename'];
		$input['password'] = md5($input['password']);
		Siakad::create($input);

		return Redirect::route('admin.siakad.index')
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
		$siakad = Siakad::find($id);
		$prodi = Prodi::find($siakad->prodi_id);

		$jurusans = Jurusan::all();

		$prodis = DB::table('prodi')
					->where('jurusan_id', $prodi->jurusan_id)
					->get(array('prodi.*'));

		return View::make('admin.siakad.edit')
			->withProdi($prodi)
			->withJurusans($jurusans)
			->withProdis($prodis)
			->withSiakad($siakad);
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
		$data = [];

		$siakad = Siakad::find($id);
		$input['foto'] = $siakad->foto;

		if (Request::hasFile('foto')) {
			$data['result'] = Imageupload::upload(Request::file('foto'));
			$input['foto'] = $data['result']['original_filename'];

			$filename = public_path().'/uploads/images/'.$siakad->foto;
			if (File::exists($filename)) {
				File::delete($filename);
			} 
		}

		$siakad = Siakad::find($id);
		$siakad->update($input);

		return Redirect::route('admin.siakad.index')
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
		$siakad = Siakad::find($id);
		$filename = public_path().'/uploads/images/'.$siakad->foto;

		if (File::exists($filename)) {
			File::delete($filename);
		} 
		
		$siakad->delete();

		return Redirect::route('admin.siakad.index')
			->with('successMessage', 'Berhasil Menghapus Data');
	}


}
