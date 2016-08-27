<?php

class APIIndustriController extends BaseController {


	public function getCari()
	{
		$input = Input::all();


		// print_r($input);
		//query inti
		$query = DB::table('industri')
					->join('kategori_industri', 'industri.id', '=', 'kategori_industri.industri_id')
					->join('kategori', 'kategori_industri.kategori_id', '=', 'kategori.id')
					->leftJoin('likeable_like_counters', 'industri.id', '=', 'likeable_like_counters.likable_id')
					->select('industri.id', 'industri.nama_industri', 'industri.deskripsi', 'industri.alamat', 'industri.lat', 'industri.lng', 'industri.jumlah_karyawan', 'industri.foto', 'industri.foto_url', 'industri.foto_key', 'likeable_like_counters.count')
					->orderBy('likeable_like_counters.count', 'desc')
					->groupBy('industri.id')
					->groupBy('likeable_like_counters.count');

		//cari sesuai nama_kategori[] dan spesifikasi[]
		if(isset($input['nama_kategori']) && isset($input['spesifikasi'])) {
			for($i=0; $i<sizeof($input['nama_kategori']);$i++){
			   $query->orWhere('nama_kategori', $input['nama_kategori'][$i]);
			}

			for($i=0; $i<sizeof($input['spesifikasi']);$i++){
			   $query->orWhere('kategori_industri.spesifikasi', $input['spesifikasi'][$i]);
			}

			$result = $query->get();
		} elseif(isset($input['nama_kategori'])) {
			for($i=0; $i<sizeof($input['nama_kategori']);$i++){
			   $query->orWhere('nama_kategori', $input['nama_kategori'][$i]);
			}

			$result = $query->get();
		} elseif(isset($input['spesifikasi'])) {
			for($i=0; $i<sizeof($input['spesifikasi']);$i++){
			   $query->orWhere('kategori_industri.spesifikasi', $input['spesifikasi'][$i]);
			}	

			$result = $query->get();
		}
		else {
			$result = array();
		}

		Session::flush();

		return Response::json(array(
				'status' => 'success',
	            'industris'=>$result,
	            'param' => $input),
	            200
	        );
		// return $input;
	}


	public function getTestimoniShort()
	{
		$industri_id = Input::get('industri_id');
		$data = DB::table('testimoni')
					->join('mahasiswa', 'mahasiswa.id', '=', 'testimoni.mahasiswa_id')
					->where('industri_id', $industri_id)
					->select('testimoni.created_at','nama_mahasiswa','nim','testimoni')
					->take(3)
					->orderBy('testimoni.created_at', 'desc')
					->get();

		return Response::json(array(
				'status' => 'success',
	            'testimoni'=>$data),
	            200
	        );
	}

	public function getTestimoni()
	{
		$industri_id = Input::get('industri_id');
		$data = DB::table('testimoni')
					->join('mahasiswa', 'mahasiswa.id', '=', 'testimoni.mahasiswa_id')
					->where('industri_id', $industri_id)
					->select('testimoni.created_at','nama_mahasiswa','nim','testimoni')
					->orderBy('testimoni.created_at', 'desc')
					->get();

		return Response::json(array(
				'status' => 'success',
	            'testimoni'=>$data),
	            200
	        );
	}

	public function postTestimoni()
	{
		$input = Input::all();
		$cek = Testimoni::create($input);	

		if($cek) {
			return Response::json(array(
	            'status' => 'success',
	            'message' => 'Berhasil Menambahkan Testimoni'),
	            200
	        );
		} else {
			return Response::json(array(
	            'status' => 'failed',
	            'message' => 'Gagal Menambahkan Testimoni'),
	            401
	        );
		}
	}

}