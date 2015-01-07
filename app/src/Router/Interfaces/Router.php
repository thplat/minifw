<?php 

namespace App\Router\Interfaces;

interface Router {

	public function get( $uri, $action );
	public function post( $uri, $action );

}