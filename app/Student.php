<?php namespace App;

//use App\Http\Controllers\Auth\Loginxml;
use Illuminate\Database\Eloquent\Model;
//require(__DIR__ . '/Http/Controllers/Auth/Loginxml.php');
require('Loginxml.php');


class Student extends Model{

	protected $table = 'student';

	public static function getFirst($utorid){
//		return Student::select("first")->where("utorid", "=", "$utorid");

//		var_dump(phpinfo());
//		die();
		$obj = new Loginxml();
		$obj->loginxml();
		$result = $obj->getProfile($utorid);
//
//		var_dump($result);
		return $result->return;
//
//
//
//		return Student::where("utorid", $utorid)->get();
	}

	public static function getFirstBarcode($utorid){
//		return Student::select("first")->where("utorid", "=", "$utorid");

//		var_dump(phpinfo());
//		die();
		$obj = new Loginxml();
		$obj->loginxml();
		$result = $obj->getProfileBarcode($utorid);
//
//		var_dump($result);
		return $result->return;
//
//
//
//		return Student::where("utorid", $utorid)->get();
	}
}
