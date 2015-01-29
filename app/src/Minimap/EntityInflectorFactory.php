<?php
namespace App\Minimap;

use App\Minimap\Interfaces\EntityInflectorFactory AS FactoryInterface;
use App\Minimap\EntityInflector;

class EntityInflectorFactory implements FactoryInterface {

    public function create( $object )
    {
        return new EntityInflector( $object );
    }

} 