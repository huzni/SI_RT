<?php

class APIKategoriController extends BaseController {


	public function getList()
	{
		$prodi_id = Input::get('prodi_id');
		$data = DB::table('kategori')
					->where('prodi_id', $prodi_id)
					->get();

		return Response::json(array(
				'status' => 'success',
	            'data' => array('kategori'=>$data)),
	            200
	        );
	}

}
