<?php

namespace App\Router;

use App\Router\Interfaces\UriMatcher;
use Auryn\Provider AS Container;

class Router implements Interfaces\Router {

	protected $matcher;
	protected $routes;

	public function __construct( UriMatcher $matcher )
	{
		$this->matcher = $matcher;
	}

	public function get( $uri, $action )
	{
		$this->routes['GET'][$uri] = $action;
	}

	public function post()
	{
		echo "Post Route";
	}

	public function dispatch( Container $container )
	{
		$action = $this->matcher->find( $this->routes );

		if( is_callable($action) )
		{
			return $this->executeCallable( $action );
		}
		else
		{
			return $this->executeMethod( $action, $container );
		}
	}

	protected function executeCallable( Callable $callable )
	{
		return $callable();
	}

	protected function executeMethod( $action, Container $container )
	{
        $controller_name = key($action);

        $controller = $container->make($controller_name);
        return $container->execute([$controller, $action[$controller_name]]);
	}

}