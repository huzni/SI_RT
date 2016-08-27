<?php

class MahasiswaController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$jurusans = Jurusan::all();
		
		$mahasiswas = DB::table('mahasiswa')
		    ->join('prodi', 'prodi.id', '=', 'mahasiswa.prodi_id')
		    ->orderBy('nama_prodi', 'asc')
		    ->orderBy('nim', 'asc')
		    ->get(array('mahasiswa.*', 'prodi.nama_prodi'));

		return View::make('admin.mahasiswa.index')
			->withJurusans($jurusans)
			->withMahasiswas($mahasiswas);
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
		$data = [];

		if (Request::hasFile('foto')) {
			$data['result'] = Imageupload::upload(Request::file('foto'));
		}

		$input['foto'] = $data['result']['original_filename'];
		$input['password'] = md5($input['password']);
		Mahasiswa::create($input);

		return Redirect::route('admin.mahasiswa.index')
			->with('successMessage', 'Berhasil Menambahkan Data Baru');
	}

	public function loginMahasiswa(){
		$input = Input::only('nim', 'password');
		$login = DB::table('mahasiswa')
		->select('id')->where('nim', $input['nim'])->where('password', md5($input['password']))->first();



		if ($login==null) {
			return Response::json(array(
				'status' => 'failed',
				'message' => 'nim dan password salah'
				), 401);
		} else {
			$mahasiswa = DB::table('mahasiswa')
					->join('prodi', 'mahasiswa.prodi_id', '=', 'prodi.id')
					->select('mahasiswa.id', 'mahasiswa.nama_mahasiswa', 'mahasiswa.alamat', 'prodi.nama_prodi', 'mahasiswa.nim')
					->where('mahasiswa.nim', $input['nim'])
					->where('mahasiswa.password', md5($input['password']))
					->first();

			return Response::json(array(
					'status' => 'success',
					'mahasiswa' => $mahasiswa
				), 200);
			
		}
	}

	public function listMahasiswa()
	{
		return Mahasiswa::all();
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
		$mahasiswa = Mahasiswa::find($id);
		$prodi = Prodi::find($mahasiswa->prodi_id);

		$jurusans = Jurusan::all();

		$prodis = DB::table('prodi')
					->where('jurusan_id', $prodi->jurusan_id)
					->get(array('prodi.*'));

		return View::make('admin.mahasiswa.edit')
			->withProdi($prodi)
			->withJurusans($jurusans)
			->withProdis($prodis)
			->withMahasiswa($mahasiswa);
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

		$mahasiswa = Mahasiswa::find($id);
		$input['foto'] = $mahasiswa->foto;

		if (Request::hasFile('foto')) {
			$data['result'] = Imageupload::upload(Request::file('foto'));
			$input['foto'] = $data['result']['original_filename'];

			$filename = public_path().'/uploads/images/'.$mahasiswa->foto;
			if (File::exists($filename)) {
				File::delete($filename);
			} 
		}

		$mahasiswa = Mahasiswa::find($id);
		$mahasiswa->update($input);

		return Redirect::route('admin.mahasiswa.index')
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
		$mahasiswa = Mahasiswa::find($id);
		$filename = public_path().'/uploads/images/'.$mahasiswa->foto;

		if (File::exists($filename)) {
			File::delete($filename);
		} 
		
		$mahasiswa->delete();

		return Redirect::route('admin.mahasiswa.index')
			->with('successMessage', 'Berhasil Menghapus Data');
	}

	public function getReset($id)
    {
        $mahasiswa = Mahasiswa::find($id);
		$mahasiswa->password = md5($mahasiswa->nim);;
		$mahasiswa->save();

		return Redirect::route('admin.mahasiswa.index')
			->with('successMessage', 'Berhasil Mereset Password');
    }


}
