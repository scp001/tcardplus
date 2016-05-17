<?php namespace App\Http\Controllers;

use Session, Redirect, Input;
class StudentController extends Controller {

	public function getstudent($utorid){
		$student = student::where("utorid", $utorid)->lists('first', 'last');
		return response()->json(['success' => true, 'student' => $student]);
	}
}
