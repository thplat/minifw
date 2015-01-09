<?php
namespace App\Minimap;

use ReflectionClass;
use App\Minimap\Exceptions\ConfigurationTraitNotFoundException;

class PersistenceInflector {

    protected $object;
    protected $reflectionClass;
    // Prefix that is used to determine the classes configuration trait
    // Maybe needs to be moved out into some config
    protected $traitPrefix = 'Persist';

    public function __construct( $object )
    {
        $this->object = $object;
        $this->reflectionClass = new ReflectionClass( $object );
    }

    public function getTraitProperties()
    {

        $traits = $this->reflectionClass->getTraits();
        $namespace = $this->reflectionClass->getNamespaceName();
        $traitName = $namespace . '\\' . $this->traitPrefix . $this->reflectionClass->getShortName();

        $configurationTrait = null;

        if( array_key_exists( $traitName, $traits ) )
            $configurationTrait = $traits[$traitName];
        else
            throw new ConfigurationTraitNotFoundException("Configuration Trait {$traitName} could not be found");

        return $configurationTrait->getDefaultProperties();
    }

    public function getClassProperties()
    {
        $properties = [];

        foreach( $this->reflectionClass->getProperties() AS $key => $property )
        {
            $property->setAccessible(true);
            $properties[$property->getName()] = $property->getValue( $this->object );
        }

        return $properties;
    }

} 