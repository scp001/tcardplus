<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class member extends Model{

	/**
	 * The database table used to hold the data for one member so that the
	 * tspc_submitted table is does not have too many columns.
	 *
	 * @var string
	 */
	protected $table = 'member';
	
	/**
	 * ----------Table Fields-----------
	 *
	 * @param int id the primary key of the row
	 * @param string member name of the member
	 * @param string rank the rank of the member (i.e. instructor or administrator)
	 * @param string department the department that the member belongs to
	 * @param boolean no_conflict_of_interest 0 if member was saved without no conflict of interest selected, 1 if otherwise
	 */
	
	/**
	 * 
	 * @param $members associative two dimensional array conatining all the members being submitted each array conatins all table fields
	 * @return int[] arrya containing all the primary keys of the members that were just inserted
	 */
	public static function insertMembersForKeys($members){
		$original_keys = Member::all()->modelKeys();
		Member::Insert($members);
		$current_keys = Member::all()->modelKeys();
		return array_values(array_diff($current_keys, $original_keys));
	} 
	
	/**
	 * 
	 * @param int[] $keys array of primary keys for form table
	 * @return query object cobntaing all the rows with primary keys in $keys
	 * in hindsight this function could be done with a whereIn but you get the same result
	 */
	public static function collectMemberData($keys){
		$query = Member::select("member", "rank", "department")->where("id", "=", "$keys[0]");
		foreach (array_slice($keys,1) as $key){
			$query = $query->orWhere("id", "=", $key);
		}
		
		return $query;
	}
	
	/**
	 * Deletes all the members that have primary keys in $keys
	 * @param int[] $keys array of primary keys for form table
	 */
	public static function removeOldKeys($keys){
		Member::whereIn("id", $keys)->delete();
	}
}