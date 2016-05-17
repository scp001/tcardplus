<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;

	/**
	 * The database table used to list admin users.
	 *
	 * @var string
	 */
	protected $table = 'user';

	/**
	 * ----------Table Fields-----------
	 *
	 * @param int id the primary key of the row
	 * @param string information description of the form status
	 */

	/**
	 * sets user permission to either ADMIn or REGULAR depanding on whether there is an etry for that user in the user table
	 * @param int $peopleid the people id recieved from the intranet of the user logging in
	 * @return string this string is either admin or regular
	 */
	public static function setUserPermission($peopleid){
		$permission = User::where("peopleid", $peopleid)->where("permission_level", ADMIN)->get()->toArray();
		return !empty($permission) ? ADMIN : REGULAR;
	}

}
