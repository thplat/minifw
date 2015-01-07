<?php

namespace App\Config;

class Config implements \App\Config\Interfaces\Config {

    /**
     * Grabs an item from a config file
     *
     * @param $name
     * @param $item
     * @return mixed
     */

	public function get( $name, $item )
	{
        // Remove ugly path declaration
		$config = include __DIR__ . '/../../../app/config/' . $name . '.php';
		return $config[$item];
	}

}