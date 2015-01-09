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

    protected $configurator;

    public function __construct( PDO $pdo )
    {
        $this->pdo = $pdo;
    }

    public function persist( $object )
    {
        $this->inflector = new PersistenceInflector( $object );
        $this->createConfigurator();
    }

    protected function createConfigurator()
    {
        $this->configurator = new ConfigurationStore( $this->pdo, $this->inflector->getTraitProperties(), $this->inflector->getClassProperties() );
        var_dump($this->configurator);
    }

}