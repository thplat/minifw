<?php

namespace App\Config\Interfaces;

interface Config {

	public function get( $file, $item );

}