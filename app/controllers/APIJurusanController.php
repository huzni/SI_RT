<?php

class APIJurusanController extends BaseController {


	public function getList()
	{
		$data = Jurusan::all();

		return Response::json(array(
				'status' => 'success',
	            'data' => array('jurusan'=>$data)),
	            200
	        );
	}

}
