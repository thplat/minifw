<?php

namespace App\Router;

use App\Request\Request;
use App\Request\Exceptions\HttpNotFoundException;

class UriMatcher implements Interfaces\UriMatcher {
	
	protected $request;

	public function __construct( Request $request )
	{
		$this->request = $request;
	}

	public function find( $routes )
	{
		$uri = '/' . trim( $this->request->getPathInfo(), '/' );
		$request_type = $this->request->getMethod();

		if( array_key_exists( $uri, $routes[ $request_type ] ) )
			return $routes[$request_type][$uri];

		throw new HttpNotFoundException("[$uri] could not be found.");
	}

}