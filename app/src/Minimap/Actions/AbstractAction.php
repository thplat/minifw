<?php
namespace App\Minimap\Actions;

use App\Minimap\Interfaces\ConfigurationStore;

abstract class AbstractAction {

    protected $configurationStore;

    public function __construct( ConfigurationStore $configurationStore )
    {
        $this->configurationStore = $configurationStore;
    }

} 