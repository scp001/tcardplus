<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\Auth\Login;
use Carbon\Carbon;
use DB;
class Payment extends Model{

	/**
	 * The database table used to hold the information for each form submitted.
	 *
	 * @var string
	 */
	protected $table = 'payment_detail';


	public static function getPay($id=null)
	{
		if (!$id) {
			return Payment::select(
				"trasaction_id",
				"visa",
				"master",
				"debit",
				"express",
				"cash",
				"other"
			);

		}
		else{
			return Payment::select(
				"trasaction_id",
				"visa",
				"master",
				"debit",
				"express",
				"cash",
				"other"
			)->where('trasaction_id','=', $id );
		}
	}

}
