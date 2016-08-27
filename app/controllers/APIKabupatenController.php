<?php

class APIKabupatenController extends BaseController {


	public function getList()
	{
		$provinsi_id = Input::get('provinsi_id');
		$data = DB::table('kabupaten')
					->where('provinsi_id', $provinsi_id)
					->get();

		return Response::json(array(
				'status' => 'success',
	            'data' => array('kabupaten'=>$data)),
	            200
	        );
	}

}
