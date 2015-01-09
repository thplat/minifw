<?php
namespace App\Minimap;

class ConfigurationStore implements Interfaces\ConfigurationStore {

    protected $datastore;
    protected $config;
    protected $properties;

    public function __construct( \PDO $datastore, $config, $properties )
    {
        $this->datastore = $datastore;
        $this->config = $config;
        $this->properties = $properties;
    }

    public function getDataStore()
    {
        return $this->datastore;
    }

    public function getConfigurationProperties()
    {
        return $this->config;
    }

    public function getClassProperties()
    {
        return $this->properties;
    }

} 