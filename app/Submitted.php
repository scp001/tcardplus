<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\Auth\Login;
use Carbon\Carbon;
use DB;
class Submitted extends Model{


	/**
	 * The database table used to hold the information for each form submitted.
	 *
	 * @var string 
	 */
	protected $table = 'payment';

	public static function getSubmissionsForConfirm(){
		//TODO: select department when that is working
		return Submitted::join("status", "tspc_submitted.status_id", "=", "status.id")->join("form", "tspc_submitted.form_id", "=", "form.id")
		->select('tspc_submitted.id', 'candidate', 'information', 'submitted_by', 'email', 'form.form_name', DB::raw("form.id AS form_id"), 'form.shortname', 'tspc_submitted.created_at');
		//->where("tspc_submitted.status_id", "=", 0);
	}

	public static function insertCompleteForm($utorid, $first, $last, $tnumber, $email, $meal_id, $meal_detail,$residence, $green, $inter,
		$other_meal,$other_pay,$plan_amount,$additional_buck,$comment,$order,$visa_amount, $master_amount, $debit_amount, $express_amount, $cash_amount, $other_amount, $created_date){
		$data["utorid"] = $utorid;
		$data["first"] = $first;
		$data["last"] = $last;
		$data["tnumber"] = $tnumber;
		$data["email"] = $email;
		$data["meal_id"] = $meal_id;
		$data["meal_detail_id"] = $meal_detail;
		$data["residence"] = $residence;
		$data["greenpath_other"] = $green;
		$data["international"] = $inter;
		$data["other_meal"] = $other_meal;
		$data["other_pay"] = $other_pay;
		$data["meal_plan_amount"] = $plan_amount;
		$data["additional_tbuck"] = $additional_buck;
		$data["comment"] = $comment;
		$data["order_num"] = $order;
		$data["created_date"] = $created_date;

		Submitted::insert($data);
//		$trasaction_id = Submitted::getPdo()->lastInsertId();
		$trasaction_id = DB::table('payment')->max('id');

		$data2["trasaction_id"] = $trasaction_id;
		$data2["visa"] = $visa_amount;
		$data2["master"] = $master_amount;
		$data2["debit"] = $debit_amount;
		$data2["express"] = $express_amount;
		$data2["cash"] = $cash_amount;
		$data2["other"] = $other_amount;

		DB::table('payment_detail')->insert($data2);

	}

	public static function getReportById($order_id){

		return Submitted::select(
					"order_num",
					"first",
					"last",
					"utorid",
					"tnumber",
					"email",
					"meal_id",
					"meal_plan_amount",
					"additional_tbuck",
					"created_date",
					"comment",
					"id",
					"residence",
					"greenpath_other",
					"international",
					"meal_detail_id",
					"other_meal",
					"other_pay"
				)
					->where('id', '=', $order_id);
	}

	public static function updateReportOrderById($info,$new_num){


		Submitted::where('id', '=', intval($info))->update(array('order_num' => $new_num['order_num']));

	}

	public static function updateReportCommentOrderById($info,$comment){


		Submitted::where('id', '=', intval($info))->update(array('comment' => $comment['comment']));

	}


	public static function getReport($timerange=null){

		//default to return last 30 days
		if (! $timerange){
			return Submitted::select(
				"order_num",
				"first",
				"last",
				"utorid",
				"tnumber",
				"email",
				"meal_id",
				"meal_plan_amount",
				"additional_tbuck",
				"created_date",
				"comment",
				"id",
				"other_meal",
				"meal_detail_id",
				"residence",
				"greenpath_other",
				"international",
				"other_pay"
			)
				->where('created_date', '>=', Carbon::now('America/Toronto')->subMonth())->orderBy('created_date', 'DESC');
		}
		else{
			$dates = explode(" ", $timerange);
			if ($dates[0] == $dates[1] && $dates[0] == Carbon::now('America/Toronto')->toDateString()){
				return Submitted::select(
					"order_num",
					"first",
					"last",
					"utorid",
					"tnumber",
					"email",
					"meal_id",
					"meal_plan_amount",
					"additional_tbuck",
					"created_date",
					"comment",
					"id",
					"other_meal",
					"meal_detail_id",
					"residence",
					"greenpath_other",
					"international",
					"other_pay"

				)
					->where('created_date', '>=', new \DateTime('today'))->orderBy('created_date', 'DESC');
			}
			else if ($dates[0] == $dates[1] && $dates[0] == Carbon::now('America/Toronto')->subDay(1)->toDateString()){
				return Submitted::select(
					"order_num",
					"first",
					"last",
					"utorid",
					"tnumber",
					"email",
					"meal_id",
					"meal_plan_amount",
					"additional_tbuck",
					"created_date",
					"comment",
					"id",
					"other_meal",
					"meal_detail_id",
					"residence",
					"greenpath_other",
					"international",
					"other_pay"

				)
					->where('created_date', '>=', new \DateTime('yesterday'))
					->where('created_date', '<', new \DateTime('today'))->orderBy('created_date', 'DESC');

			}

			else if ($dates[0] != $dates[1] && $dates[1] == Carbon::now('America/Toronto')->toDateString()){

				return Submitted::select(
					"order_num",
					"first",
					"last",
					"utorid",
					"tnumber",
					"email",
					"meal_id",
					"meal_plan_amount",
					"additional_tbuck",
					"created_date",
					"comment",
					"id",
					"other_meal",
					"meal_detail_id",
					"residence",
					"greenpath_other",
					"international",
					"other_pay"

				)
					->where('created_date', '>=', $dates[0])->orderBy('created_date', 'DESC');
			}

			else if ($dates[0] != $dates[1] && $dates[1] != Carbon::now('America/Toronto')->toDateString()){

				return Submitted::select(
					"order_num",
					"first",
					"last",
					"utorid",
					"tnumber",
					"email",
					"meal_id",
					"meal_plan_amount",
					"additional_tbuck",
					"created_date",
					"comment",
					"id",
					"other_meal",
					"meal_detail_id",
					"residence",
					"greenpath_other",
					"international",
					"other_pay"

				)
					->where('created_date', '>=', $dates[0])
					->where('created_date', '<=', Carbon::parse($dates[1])->endOfDay())->orderBy('created_date', 'DESC');

			}
		}
	}


	// public function member1() {
	// 	return $this->hasOne('App\Member', 'id', 'member1');
	// }
	// public function member2() {
	// 	return $this->hasOne('App\Member', 'id', 'member2');
	// }
	// public function member3() {
	// 	return $this->hasOne('App\Member', 'id', 'member3');
	// }
	// public function member4() {
	// 	return $this->hasOne('App\Member', 'id', 'member4');
	// }
	// public function member5() {
	// 	return $this->hasOne('App\Member', 'id', 'member5');
	// }
	// public function member6() {
	// 	return $this->hasOne('App\Member', 'id', 'member6');
	// }
	// public function member7() {
	// 	return $this->hasOne('App\Member', 'id', 'member7');
	// }
	// public function subMember1() {
	// 	return $this->hasOne('App\Member', 'id', 'sub_member1');
	// }
	// public function subMember2() {
	// 	return $this->hasOne('App\Member', 'id', 'sub_member2');
	// }
}
