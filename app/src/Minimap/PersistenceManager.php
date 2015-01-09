<?php

namespace App\Minimap;

use PDO;

/**
 * Class PersistenceManager
 * @package App\Minimap
 *
 * Minimalistic ORM implementation
 * @todo outsource into own composer package
 * @todo finish sample implementation
 */
class PersistenceManager {

    protected $pdo;
    protected $inflector;
    protected $map = [];

    public function __construct( PDO $pdo )
    {
        $this->pdo = $pdo;
    }

    public function persist( $object )
    {
        $this->inflector = new PersistenceInflector( $object );
        $this->mapProperties();
    }

    protected function mapProperties()
    {
        $props = $this->inflector->getTraitProperties();
        var_dump($props);

        var_dump($this->inflector->getClassProperties());
    }

}