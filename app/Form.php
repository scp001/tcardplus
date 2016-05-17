<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Form extends Model{

	/**
	 * The database table used hold the ids and names
	 * of the five possible forms you can submit in this application.
	 *
	 * @var string
	 */
	protected $table = 'form';

	/**
	 * ----------Table Fields-----------
	 *
	 * @param int id the ID of the form
	 * @param string form_name the name of the form
	 * @param string shortname an abriviated version of the form_name
	 */

	/**
	 *
	 * @param string $shortname an abriviated version of the form_name
	 * @return the id of the form with $shortname
	 */
	public static function getID($shortname){
		return From::select("id")->where("shortname", "=", "$shortname");
	}
}
