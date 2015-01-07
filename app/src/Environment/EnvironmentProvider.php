<?php

namespace App\Environment;

use App\Provider\Interfaces\Provider;
use Auryn\Provider AS Container;

class EnvironmentProvider implements Provider {

	public function provide( Container $container )
	{
        $config = $container->make('App\Config\Config');
        $environment = $config->get('app', 'environment');
        (new EnvironmentConfigurator( $environment ))->configure();
	}

}