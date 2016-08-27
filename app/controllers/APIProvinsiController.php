<?php

class APIProvinsiController extends BaseController {


	public function getList()
	{
		$data = Provinsi::all();

		return Response::json(array(
				'status' => 'success',
	            'data' => array('provinsi'=>$data)),
	            200
	        );
	}

}
