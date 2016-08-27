<?php

class APIProdiController extends BaseController {


	public function getList()
	{
		$id = Input::get('id');
		$data = Prodi::where('jurusan_id', $id)
					->get();

		return Response::json(array(
				'status' => 'success',
	            'data' => array('prodi'=>$data)),
	            200
	        );
	}

}
