<?php namespace Illuminate\Foundation\Bootstrap;

use Dotenv;
use InvalidArgumentException;
use Illuminate\Contracts\Foundation\Application;

class DetectEnvironment {

	/**
	 * Bootstrap the given application.
	 *
	 * @param  \Illuminate\Contracts\Foundation\Application  $app
	 * @return void
	 */
	public function bootstrap(Application $app)
	{
		try
		{
			Dotenv::load($app['path.base'], $app->environmentFile());
		}
		catch (InvalidArgumentException $e)
		{
			//
		}

		$app->detectEnvironment(function()
		{
			// return env('APP_ENV', 'production');
			if (isset($_SERVER['INTRANET_DEMO']))
			{
//			return $_SERVER['INTRANET_DEMO'] == 'yes' ? env('APP_ENV', 'beta') : env('APP_ENV', 'production');
				return $_SERVER['INTRANET_DEMO'] == 'yes' ? env('APP_ENV', 'beta') : env('APP_ENV', 'production');
			}
			else{
				return env('APP_ENV', 'local');
			}

		});
	}

}
