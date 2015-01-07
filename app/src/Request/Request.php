<?php

namespace App\Request;

class Request extends \Http\HttpRequest {

	public function getPathInfo()
	{
		return isset($this->server['PATH_INFO']) ? $this->server['PATH_INFO'] : '';
	}

}