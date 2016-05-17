<?php namespace App\Http\Controllers;

use Session, Redirect, Input, App\Submitted, Mail, URL, File;
use Carbon\Carbon;
class APIController extends Controller {

	public function submitForm(){
		
		$utorid = Input::get("utorid", null);
		$first = Input::get("first", null);
		$last = Input::get("last", null);
		$tnumber = Input::get("tcard", null);
		$email = Input::get("email", null);
		$meal_id = Input::get("meal_id", null);
		$meal_detail = Input::get("meal_detail", null);
		$residence = Input::get("residence", null);
		$green = Input::get("green", null);
		$inter = Input::get("inter", null);
		$other_meal = Input::get("other_meal", null);
//		$pay_id = Input::get("pay_id", null);
		$other_pay = Input::get("other_pay", null);
		$plan_amount = Input::get("plan_amount", null);
		$additional_buck = Input::get("additional_buck", null);
		$comment = Input::get("comment", null);
		$order = Input::get("order", null);

		$visa_amount = Input::get("visa_amount", null);
		$master_amount = Input::get("master_amount", null);
		$debit_amount = Input::get("debit_amount", null);
		$express_amount = Input::get("express_amount", null);
		$cash_amount = Input::get("cash_amount", null);
		$other_amount = Input::get("other_amount", null);

		$created_date =  Carbon::now('America/Toronto');

		Submitted::insertCompleteForm($utorid, $first, $last, $tnumber, $email, $meal_id, $meal_detail,$residence, $green, $inter,
			$other_meal,$other_pay,$plan_amount,$additional_buck,$comment,$order,$visa_amount, $master_amount, $debit_amount, $express_amount, $cash_amount, $other_amount, $created_date);



		$subject = "Your TCard+ Meal Plan Receipt";

		$total = $plan_amount + $additional_buck;

		if ($meal_id == 1){
			$meal_plan = 'Meal Plan Value';
		}
		else if ($meal_id == 2){
			$meal_plan =  'Meal Plan Semester';
		}
		else if ($meal_id == 3){
			$meal_plan = 'Meal Plan Lite';
		}
		else if ($meal_id == 4){
			$meal_plan = 'Meal Plan Regular';
		}
		else {
			$meal_plan = 'Other';
		}

		if ($meal_detail == 1){
			$meal_plan_detail = 'January';
		}
		else if ($meal_detail == 2){
			$meal_plan_detail = 'February';
		}
		else if ($meal_detail == 3){
			$meal_plan_detail = 'March';
		}
		else if ($meal_detail == 4){
			$meal_plan_detail = 'April';
		}
		else if ($meal_detail == 5){
			$meal_plan_detail = 'May';
		}
		else if ($meal_detail == 6){
			$meal_plan_detail = 'June';
		}
		else if ($meal_detail == 7){
			$meal_plan_detail = 'July';
		}
		else if ($meal_detail == 8){
			$meal_plan_detail = 'August';
		}
		else if ($meal_detail == 9){
			$meal_plan_detail = 'September';
		}
		else if ($meal_detail == 10){
			$meal_plan_detail = 'October';
		}
		else if ($meal_detail == 11){
			$meal_plan_detail = 'November';
		}
		else if ($meal_detail == 12){
			$meal_plan_detail = 'December';
		}
		else if ($meal_detail == 13){
			$meal_plan_detail = 'Summer';
		}
		else if ($meal_detail == 14){
			$meal_plan_detail = 'Falls';
		}
		else if ($meal_detail == 15){
			$meal_plan_detail = 'Winter';
		}
		else if ($meal_detail == 16){
			$meal_plan_detail = 'Fall and Winter';
		}
		else{
			$meal_plan_detail = $other_meal;
		}

		$way = "";
		if ($visa_amount){
			$way = $way."Visa, ";
		}
		if ($master_amount){
			$way = $way."MasterCard, ";
		}
		if ($debit_amount){
			$way = $way."Debit, ";
		}
		if ($express_amount){
			$way = $way."American Express, ";
		}
		if ($cash_amount){
			$way = $way."Cash, ";
		}
		if ($other_amount){
			$way = $way."Other, ";
		}
		$way = substr($way, 0, -2);

		date_default_timezone_set('America/Toronto');


		Mail::send('emails.receipt', ['total'=>number_format($total,2), 'meal_plan'=>$meal_plan, 'plan_amount'=>number_format($plan_amount,2), 'additional_buck'=>number_format($additional_buck,2), 'meal_plan_detail'=> $meal_plan_detail, 'created_date'=>  date("Y-m-d h:i:sa"), 'first' => $first, 'payment_method' => $way, 'order' => $order, 'additional' => $additional_buck], function($message) use ($email,$subject)
		{
			$message->to($email)->subject($subject);
		});


//		if ($emailfncerror){
//
//			Session::flash("error sending email");
//			die;
//		}

//		var_dump($emailfncerror);
//		die;


		Session::flash('success', "Your Form has been submitted");
		return Redirect::to('forms/1');
	}
}
