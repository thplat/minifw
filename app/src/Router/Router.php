<?php

namespace App\Router;

use App\Router\Interfaces\UriMatcher;
use Auryn\Provider AS Container;

/**
 * Class Router
 * @package App\Router
 *
 * temporary Router dummy to test
 * dispatching
 */

class Router implements Interfaces\Router {

	protected $matcher;
	protected $routes;

	public function __construct( UriMatcher $matcher )
	{
		$this->matcher = $matcher;
	}

    /**
     * @param $uri
     * @param $action
     *
     * Registers a GET Route
     */
	public function get( $uri, $action )
	{
		$this->routes['GET'][$uri] = $action;
	}

    /**
     * @param $uri
     * @param $action
     *
     * Registers a POST Route
     */
	public function post( $uri, $action )
	{
		$this->routes['POST'][$uri] = $action;
	}

    /**
     * @param Container $container
     * @return mixed
     *
     * Matches the given URI against a map of declared
     * routes and executes either a closure or a controller
     * method.
     */
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

    /**
     * @param callable $callable
     * @return mixed
     *
     * Executes a callable
     */
	protected function executeCallable( Callable $callable )
	{
		return $callable();
	}

    /**
     * @param $action
     * @param Container $container
     * @return mixed
     *
     * Resolves a controller out of the DI-Container
     */
	protected function executeMethod( $action, Container $container )
	{
        $controller_name = key($action);

        $controller = $container->make($controller_name);
        return $container->execute([$controller, $action[$controller_name]]);
	}

}