<?php

namespace App\Provider\Interfaces;

use Auryn\Provider AS Container;

interface Provider {

	public function provide( Container $dic );

}