<?php

namespace App\Config;

use App\Provider\Interfaces\Provider;
use Auryn\Provider AS Container;

class ConfigProvider implements Provider {

	public function provide( Container $container )
	{
        $container->alias('App\Config\Interfaces\Config', 'App\Config\Config');
		$container->share('App\Config\Config');
	}

}