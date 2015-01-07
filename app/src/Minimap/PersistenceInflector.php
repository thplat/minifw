<?php
namespace App\Minimap;

use ReflectionClass;

class PersistenceInflector {

    protected $object;
    protected $reflected;

    public function __construct( $object )
    {
        $this->object = $object;
        $this->reflected = new ReflectionClass( $object );
    }

    public function getTraitProperties()
    {
        foreach( $reflectionClass->getTraits() AS $trait )
        {

        }
    }

} 