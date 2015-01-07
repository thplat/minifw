<?php

namespace App\Router;

use App\Provider\Interfaces\Provider;
use Auryn\Provider AS Container;

class RouterProvider implements Provider {

	public function provide( Container $container )
	{
		$container->define('\Http\HttpRequest', [
			':get' 		=> $_GET,
			':post'		=> $_POST,
			':cookies'	=> $_COOKIE,
			':files'		=> $_FILES,
			':server'	=> $_SERVER
		]);

		$container->alias('App\Router\Interfaces\UriMatcher', 'App\Router\UriMatcher');
	}

}