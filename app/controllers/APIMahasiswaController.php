<?php

class APIMahasiswaController extends BaseController {


	public function doLogin()
	{
		$input = Input::only('nim', 'password');
		$login = Mahasiswa::where('nim', $input['nim'])
					->where('password', md5($input['password']))
					->get();


		if ($login->isEmpty()) {
			return Response::json(array(
				'status' => 'failed',
				'message' => 'NIM atau Password Salah'
				), 401);
		} else {
			$data = DB::table('mahasiswa')
					->join('prodi', 'mahasiswa.prodi_id', '=', 'prodi.id')
					->select('mahasiswa.id', 'mahasiswa.nama_mahasiswa', 'mahasiswa.alamat', 'prodi.nama_prodi', 'mahasiswa.nim')
					->where('mahasiswa.nim', $input['nim'])
					->where('mahasiswa.password', md5($input['password']))
					->first();

			return Response::json(array(
					'status' => 'success',
					'data' => array('mahasiswa' => $data)
				), 200);
		}
	}

}
