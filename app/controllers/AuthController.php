<?php

class AuthController extends BaseController {


	public function showLogin()
	{
		if (Auth::check())
		{
    		return Redirect::intended('admin/dashboard');
		} else {
			return View::make('auth.login');	
		}
	}

	public function doLogin()
	{
		$input = Input::only('username', 'password', 'remember');
		$remember = (Input::has('remember')) ? true : false;

		if (Auth::attempt(array('username' => $input['username'], 'password' => $input['password']),$remember))
		{
		    return Redirect::intended('admin/dashboard')
		    	->with('successMessage', 'Selamat Datang di Sistem Informasi Rekomendasi Tempat PI');
		} else {
			return Redirect::to('login')
				->with('errorMessage', 'Username atau Password Anda Salah')
				->withInput(Input::except('password'));
		}
	}

	public function doLogout()
	{
		Auth::logout();
		return Redirect::to('login')
			->with('successMessage', 'Anda Berhasil Logout');
	}

}
