<?php

namespace Http\Splash\Controllers;

use App\Config\Interfaces\Config;
use App\Minimap\PersistenceManager;

class Controller {

    protected $manager;

    public function __construct( PersistenceManager $manager )
    {
        $this->manager = $manager;
    }

    public function index( Config $config )
    {
        /**
         * Example ORM usage
         */
        $user = new \App\User\User('thomas', 21, 'thomas@devsmash.de');
        $this->manager->persist( $user );
    }

} 