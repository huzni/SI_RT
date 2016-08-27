<?php

class APISpesifikasiController extends BaseController {


	public function getList()
	{
		$prodi_id = Input::get('prodi_id');
		$data = DB::table('kategori')
					->join('kategori_industri', 'kategori_industri.kategori_id', '=', 'kategori.id')
					->where('prodi_id', $prodi_id)
					->select('kategori_industri.spesifikasi')
					->get();

		return Response::json(array(
				'status' => 'success',
	            'data' => array('spesifikasi'=>$data)),
	            200
	        );
	}

}
