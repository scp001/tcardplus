<?php namespace App\Http\Controllers;
use App\Student, App\Submitted, App\Payment;
use Carbon\Carbon;

class landingController extends Controller {

	/**
	 * @return \Illuminate\View\View
	 */
	public function showForm()
	{
		return view('forms.tcardreceipt');
	}
	public function showReport()
	{
		$orders = Submitted::getReport()->get()->toArray();
		$pay_method = Payment::getPay()->get()->toArray();
		return view('forms.tcardreport')->with(array("orders" => $orders, "pays"=>$pay_method));
	}
	public function getMethod($id)
	{
		$pays = Payment::getPay($id)->get()->toArray();
		return response()->json(['success' => true, 'pays' => $pays]);
	}
	public function refreshReport($timerange)
	{
		$orders = Submitted::getReport($timerange)->get()->toArray();
		return response()->json(['success' => true, 'orders' => $orders]);

	}

	public function getstudent($utorid){

		if (is_numeric($utorid)){
			$student = Student::getFirstBarcode($utorid);
			return response()->json(['success' => true, 'student' => $student]);
		}

		else {
		$student = Student::getFirst($utorid);
		return response()->json(['success' => true, 'student' => $student]);
		}



	}
}
