<?php namespace App\Http\Controllers;
/**
 * Class Helper
 */

use File, Config;

class Helper
{

	/**
	 * Return the link to the asset. Append the last modified timestamp to fix (for some browsers) caching issues
	 * where the old cached code is being used instead of the new code.
	 *
	 * @param string
	 * @return string
	 */
	public static function asset($path) {
		$version = "";
		if (File::exists($path))
			$version = "?v=" . File::lastModified($path);

		$secure = Config::get('app.secure');
		return asset($path, $secure) . $version;
		}
		
		public static function systemSays($string)
		{
			$string = preg_replace("/[^a-zA-Z 0-9]+/", "_", $string);       //  Replace punctuations.. with underscore..
			$string = str_replace(" ", "_", $string);
			return "SYSTEM_" . strtoupper($string);
		}
}
