<?php namespace App\Http\Controllers;
use App\Student, App\Submitted, App\Payment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Input;
use Response;

class detailController extends Controller {

	/**
	 * @return \Illuminate\View\View
	 */

	public function showDetail($order_id)
	{
		$order =  Submitted::getReportById($order_id)->get()->first();
		$pay_method = Payment::getPay($order_id)->get()->first();
		return view('forms.tcarddetail')->with(array("order" => $order, "pay"=>$pay_method));
	}

	public function updateDetail($order_id)
	{

		$new_num = Input::all();

		return Submitted::updateReportOrderById($order_id, $new_num);
	}

	public function updateCommentDetail($order_id)

	{

		$comment = Input::all();
		return Submitted::updateReportCommentOrderById($order_id, $comment);
	}

	public function exportcsv()

	{
		$data = '';
		$table = Submitted::getReport()->get()->toArray();
		$data .= ('Order#'."\t". 'First Name'."\t".'Last Name'."\t".'Utorid'."\t".'Barcode#'."\t".'Residence'."\t".'GreenPath/Other'."\t".'International'."\t".'Email'."\t".'Meal Plan Purchased'."\t".'Meal Plan Details'."\t".'Meal Plan Total'."\t".'Additional TBucks'."\t".'Order Total'."\t".'Time/Date'."\t".'Type of Payment'."\t".'Comment'."\n");
		foreach($table as $row) {

			$pay = Payment::getPay($row['id'])->get()->first();

			$way = "";
			if ($pay["visa"]){
				$way = $way."Visa ( $".number_format($pay["visa"],2)." ), ";
			}
			if ($pay["master"]){
				$way = $way."Master ( $".number_format($pay["master"],2)." ), ";
			}
			if ($pay["debit"]){
				$way = $way."Debit ( $".number_format($pay["debit"],2)." ), ";
			}
			if ($pay["express"]){
				$way = $way."American Express ( $".number_format($pay["express"],2)." ), ";
			}
			if ($pay["cash"]){
				$way = $way."Cash ( $".number_format($pay["cash"],2)." ), ";
			}
			if ($pay["other"]){
				$way = $way."Other ( $".number_format($pay["other"],2).";  comment : ".$row["other_pay"]." ), ";
			}
			$way = substr($way, 0, -2);

			//Item Name
			if ($row['meal_id'] == 1){
				$item_name = 'Meal Plan Value';
			}
			else if ($row["meal_id"] == 2){
				$item_name = 'Meal Plan Semester';
			}
			else if ($row["meal_id"] == 3){
				$item_name = 'Meal Plan Lite';

			}
			else if ($row["meal_id"] == 4){
				$item_name = 'Meal Plan Regular';
			}
			else{
				$item_name = 'Other';
			}

			// Item Details

			$item_detail =  $row['other_meal'];

			if ($row['meal_detail_id'] == 1){
				$item_detail = 'January';
			}
			else if ($row['meal_detail_id'] == 2){
				$item_detail = 'February';
			}
			else if ($row['meal_detail_id'] == 3){
				$item_detail = 'March';
			}
			else if ($row['meal_detail_id'] == 4){
				$item_detail = 'April';
			}
			else if ($row['meal_detail_id'] == 5){
				$item_detail = 'May';
			}
			else if ($row['meal_detail_id'] == 6){
				$item_detail = 'June';
			}
			else if ($row['meal_detail_id'] == 7){
				$item_detail =  'July';
			}
			else if ($row['meal_detail_id'] == 8){
				$item_detail = 'August';
			}
			else if ($row['meal_detail_id'] == 9){
				$item_detail =  'September';
			}
			else if ($row['meal_detail_id'] == 10){
				$item_detail =  'October';
			}
			else if ($row['meal_detail_id'] == 11){
				$item_detail =  'November';
			}
			else if ($row['meal_detail_id'] == 12){
				$item_detail =  'December';
			}
			else if ($row['meal_detail_id'] == 13){
				$item_detail =  'Summer';
			}
			else if ($row['meal_detail_id'] == 14){
				$item_detail =  'Fall';
			}
			else if ($row['meal_detail_id'] == 15){
				$item_detail =  'Winter';
			}
			else if ($row['meal_detail_id'] == 16){
				$item_detail =  'Fall and Winter';
			}
//			else if (!$row['meal_detail_id']){
//
//			}

			// Total

			$total = $row['meal_plan_amount'] + $row['additional_tbuck'];

			// Residence

			if ($row['residence'] == 1){
				$residence = 'YES';
			}
			else{
				$residence =  'NO';
			}

			// Green Path

			if ($row['greenpath_other'] == 1){
				$green = 'YES';
			}
			else{
				$green =  'NO';
			}

			//International

			if ($row['international'] == 1){
				$inter = 'YES';
			}
			else{
				$inter =  'NO';
			}

			//Comment
			if ($row['comment']){
				$comment = $row['comment'];
			}
			else {
				$comment = 'N/A';
			}

			//Order number
			if ($row['order_num']){
				$order_num = $row['order_num'];
			}
			else {
				$order_num = 'N/A';
			}

			$data .= ($order_num."\t".$row['first']."\t".$row['last']."\t". $row['utorid']."\t"."'".$row['tnumber']."'"."\t".$residence."\t".$green."\t".$inter."\t".$row['email']."\t".$item_name."\t".$item_detail."\t".$row['meal_plan_amount']."\t".$row['additional_tbuck']."\t".$total."\t".$row['created_date']."\t".$way."\t".$comment."\n");

		}

//		fclose($handle);
//
//		$headers = array(
//			'Content-Type' => 'application/ms-excel',
//			'Cache-control' => 'private',
//			'Content-Disposition' => 'attachment',
//			'filename' => 'report.xls',
//			'Pragma' => 'public',
//		);
//
//		return Response::download($filename, 'report.xls', $headers);
		$timerange = Carbon::now('America/Toronto')->subDays(29)->format('Y-m-d')." ".Carbon::now('America/Toronto')->format('Y-m-d');
		$len = strlen($data);
		$date = date('Ymd');
		header("Cache-control: private");
		header("Content-type: application/ms-excel");
		header("Content-Length: $len");
		header("Content-Disposition: attachment; filename=\"report_{$timerange}.xls\"");
		header("Pragma: public");
		print $data;
		exit();

	}

	public function exportcsvrange($timerange){

		$data = '';
		$table = Submitted::getReport($timerange)->get()->toArray();
		$data .= ('Order#'."\t". 'First Name'."\t".'Last Name'."\t".'Utorid'."\t".'Barcode#'."\t".'Residence'."\t".'GreenPath/Other'."\t".'International'."\t".'Email'."\t".'Meal Plan Purchased'."\t".'Meal Plan Details'."\t".'Meal Plan Total'."\t".'Additional TBucks'."\t".'Order Total'."\t".'Time/Date'."\t".'Type of Payment'."\t".'Comment'."\n");

		foreach($table as $row) {

			$pay = Payment::getPay($row['id'])->get()->first();

			$way = "";
			if ($pay["visa"]){
				$way = $way."Visa ( $".number_format($pay["visa"],2)." ), ";
			}
			if ($pay["master"]){
				$way = $way."Master ( $".number_format($pay["master"],2)." ), ";
			}
			if ($pay["debit"]){
				$way = $way."Debit ( $".number_format($pay["debit"],2)." ), ";
			}
			if ($pay["express"]){
				$way = $way."American Express ( $".number_format($pay["express"],2)." ), ";
			}
			if ($pay["cash"]){
				$way = $way."Cash ( $".number_format($pay["cash"],2)." ), ";
			}
			if ($pay["other"]){
				$way = $way."Other ( $".number_format($pay["other"],2).";  comment : ".$row["other_pay"]." ), ";
			}
			$way = substr($way, 0, -2);

			//Item Name
			if ($row['meal_id'] == 1){
				$item_name = 'Meal Plan Value';
			}
			else if ($row["meal_id"] == 2){
				$item_name = 'Meal Plan Semester';
			}
			else if ($row["meal_id"] == 3){
				$item_name = 'Meal Plan Lite';

			}
			else if ($row["meal_id"] == 4){
				$item_name = 'Meal Plan Regular';
			}
			else{
				$item_name = 'Other';
			}

			// Item Details

			$item_detail =  $row['other_meal'];

			if ($row['meal_detail_id'] == 1){
				$item_detail = 'January';
			}
			else if ($row['meal_detail_id'] == 2){
				$item_detail = 'February';
			}
			else if ($row['meal_detail_id'] == 3){
				$item_detail = 'March';
			}
			else if ($row['meal_detail_id'] == 4){
				$item_detail = 'April';
			}
			else if ($row['meal_detail_id'] == 5){
				$item_detail = 'May';
			}
			else if ($row['meal_detail_id'] == 6){
				$item_detail = 'June';
			}
			else if ($row['meal_detail_id'] == 7){
				$item_detail =  'July';
			}
			else if ($row['meal_detail_id'] == 8){
				$item_detail = 'August';
			}
			else if ($row['meal_detail_id'] == 9){
				$item_detail =  'September';
			}
			else if ($row['meal_detail_id'] == 10){
				$item_detail =  'October';
			}
			else if ($row['meal_detail_id'] == 11){
				$item_detail =  'November';
			}
			else if ($row['meal_detail_id'] == 12){
				$item_detail =  'December';
			}
			else if ($row['meal_detail_id'] == 13){
				$item_detail =  'Summer';
			}
			else if ($row['meal_detail_id'] == 14){
				$item_detail =  'Fall';
			}
			else if ($row['meal_detail_id'] == 15){
				$item_detail =  'Winter';
			}
			else if ($row['meal_detail_id'] == 16){
				$item_detail =  'Fall and Winter';
			}
//			else if (!$row['meal_detail_id']){
//
//			}

			// Total

			$total = $row['meal_plan_amount'] + $row['additional_tbuck'];

			// Residence

			if ($row['residence'] == 1){
				$residence = 'YES';
			}
			else{
				$residence =  'NO';
			}

			// Green Path

			if ($row['greenpath_other'] == 1){
				$green = 'YES';
			}
			else{
				$green =  'NO';
			}

			//International

			if ($row['international'] == 1){
				$inter = 'YES';
			}
			else{
				$inter =  'NO';
			}

			//Comment
			if ($row['comment']){
				$comment = $row['comment'];
			}
			else {
				$comment = 'N/A';
			}

			//Order number
			if ($row['order_num']){
				$order_num = $row['order_num'];
			}
			else {
				$order_num = 'N/A';
			}

			$data .= ($order_num."\t".$row['first']."\t".$row['last']."\t". $row['utorid']."\t"."'".$row['tnumber']."'"."\t". $residence."\t".$green."\t".$inter."\t".$row['email']."\t".$item_name."\t".$item_detail."\t".$row['meal_plan_amount']."\t".$row['additional_tbuck']."\t".$total."\t".$row['created_date']."\t".$way."\t".$comment."\n");

		}

//		fclose($handle);
//
//		$headers = array(
//			'Content-Type' => 'application/ms-excel',
//			'Cache-control' => 'private',
//			'Content-Disposition' => 'attachment',
//			'filename' => 'report.xls',
//			'Pragma' => 'public',
//		);
//
//		return Response::download($filename, 'report.xls', $headers);
		$len = strlen($data);
		$date = date('Ymd');
		header("Cache-control: private");
		header("Content-type: application/ms-excel");
		header("Content-Length: $len");
		header("Content-Disposition: attachment; filename=\"report_{$timerange}.xls\"");
		header("Pragma: public");
		print $data;
		exit();



	}
}


