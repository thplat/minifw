<?php

namespace App\Minimap;

use App\Minimap\EntityInflectorFactory;
use App\Database\Interfaces\Adapter;

/**
 * Class PersistenceManager
 * @package App\Minimap
 *
 * Minimalistic ORM implementation
 * @todo outsource into own composer package
 * @todo finish sample implementation
 */
class PersistenceManager {

    protected $db;
    protected $inflectorFactory;

    protected $configurator;

    public function __construct( Adapter $db, EntityInflectorFactory $inflectorFactory )
    {
        $this->db = $db;
        $this->inflectorFactory = $inflectorFactory;
    }

    public function persist( $object )
    {

        $inflectedEntity = $this->inflectorFactory->create( $object );
        echo "<pre>";
        var_dump( $inflectedEntity );
        echo "</pre>";
    }

}