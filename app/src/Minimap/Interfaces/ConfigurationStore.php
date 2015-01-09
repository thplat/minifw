<?php
namespace App\Minimap\Interfaces;

interface ConfigurationStore {

    public function getDataStore();
    public function getConfigurationProperties();
    public function getClassProperties();

} 