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

    public function __construct( PDO $pdo, ActionFactory $actionFactory )
    {
        $this->pdo = $pdo;
    }

    public function persist( $object )
    {
        $this->createConfigurator( $object );
    }

    /**
     * @param $object
     * @throws Exceptions\ConfigurationTraitNotFoundException
     *
     * Creates an ORM Configuration Object or returns
     * the current one if it already exists
     */
    protected function createConfigurator( $object )
    {
        if( !empty( $this->configurator ) )
            return $this->configurator;

        $inflector = new PersistenceInflector( $object );
        $this->configurator = new ConfigurationStore( $this->pdo, $inflector->getTraitProperties(), $inflector->getClassProperties() );
    }

}