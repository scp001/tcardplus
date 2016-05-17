<?php namespace App\Http\Controllers;
use Input, Redirect, Session;
use App\Http\Controllers\Auth\Login;
use App;
use Artisan;

class LoginController extends Controller {

	/**
	 * @return \Illuminate\View\View
	 */

	public function showLogin()
	{
//		var_dump(App::environment());
//		if (App::environment(LOCAL,BETA))
//		{
//			var_dump("LOCAL OR BETA");
//		}
//		else
//		{
//			var_dump("PRODUCTION" );
//		}
//		var_dump($_SERVER["INTRANET_DEMO"]);
//
//		die();
		if (Login::isLoggedIn()){
			if (Login::getUser()->permission == ADMIN){
				return Redirect::to('report');
			}
			return Redirect::to("login");
		}
		return view('auth.showlogin');
	}
//	public function showLogin()
//	{
//		if (Login::isLoggedIn()){
//			if (Login::getUser()->permission == ADMIN){
//				return Redirect::to('forms/1');
//			}
//			return Redirect::to("login");
//		}
//		return view('auth.showlogin');
//	}

	public function setEnv()
	{
		if (App::environment(LOCAL,BETA))
		{
//			var_dump("LOCAL OR BETA");
			if (App::environment(LOCAL)){
				Artisan::call('env:switch',  array('env' => 'local'));
				return "You have successfully switched to local config";
			}
			else {
				Artisan::call('env:switch',  array('env' => 'beta'));
				return "You have successfully switched to beta config";
			}

		}
		else
		{
			Artisan::call('env:switch',  array('env' => 'production'));
			return "You have successfully switched to production config";
		}
	}

	/**
	 * @return mixed
	 */
	public function postLogin()
	{
		$utorId  = Input::get('username');
		$password = Input::get('password');

		$login = Login::Instance();
		$ret = $login->Authenticate($utorId, $password);
//
		// Failed credential
		if ($ret == false) {
			return Redirect::to('login')->withInput();
		}
//
		if (Login::getUser()->permission == ADMIN){
			return Redirect::intended('report');
		}
		return Redirect::intended('forms/1');
	}

	/**
	 * @return mixed
	 */
	public function logOff()
	{
		$login = Login::Instance();
		$login->logOff();

		Session::flash('success', 'You have successfully logged out.');
		return Redirect::to('login');
	}

}
