<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
ini_set("soap.wsdl_cache_enabled", 0);


Route::get('setenv', array('as' => 'go', "uses" => 'LoginController@setEnv'));

Route::get('login', array('as' => 'login', "uses" => 'LoginController@showLogin'));
Route::post('login', array("uses" => 'LoginController@postLogin'));
Route::get('logout', array('as' => 'logout', 'uses' => 'LoginController@logOff'));



Route::group(array("middleware" => "login"), function () {
	Route::get('/', 'landingController@showForm');
	Route::any('api/submit', 'APIController@submitForm');
	Route::get('forms/{form_id}', 'landingController@showForm');
//	Route::post('forms/{form_id}', 'landingController@getstudent');
	Route::get('student/{utorid}', 'landingController@getstudent');
	Route::get('report/{timerange}', 'landingController@refreshReport');
	Route::get('pay/{id}', 'landingController@getMethod');
	Route::get('report', 'landingController@showReport');
	Route::get('detail/{order_id}', 'detailController@showDetail');
	Route::get('update/{order_id}', 'detailController@updateDetail');
	Route::get('updatecomment/{order_id}', 'detailController@updateCommentDetail');
	Route::get('exportcsv', 'detailController@exportcsv');
	Route::get('exportcsvrange/{timerange}', 'detailController@exportcsvrange');

});



Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);


