<?php

namespace App\Router;

use App\Request\Request;
use App\Request\Exceptions\HttpNotFoundException;

/**
 * Class UriMatcher
 * @package App\Router
 *
 * Matches an URI against a map of
 * given routes
 */

class UriMatcher implements Interfaces\UriMatcher {
	
	protected $request;

	public function __construct( Request $request )
	{
		$this->request = $request;
	}

    /**
     * @param $routes
     * @return mixed
     * @throws HttpNotFoundException
     *
     * Checks for a specific route in a map
     * of given routes
     */
	public function find( $routes )
	{
		$uri = '/' . trim( $this->request->getPathInfo(), '/' );
		$request_type = $this->request->getMethod();

		if( array_key_exists( $uri, $routes[ $request_type ] ) )
			return $routes[$request_type][$uri];

		throw new HttpNotFoundException("[$uri] could not be found.");
	}

}