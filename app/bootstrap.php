<?php 

error_reporting(E_ALL);

$container = new Auryn\Provider;

// Load and provides all specified Service Classes

$providers = require_once 'config/providers.php';
foreach( $providers['providers'] AS $provider )
{
	(new $provider( $container ))->provide( $container );
}

// Just a Test PDO connection. Needs to be moved into it's
// own service

$container->share('App\Database\Adapters\PDOAdapter');
$container->define('App\Database\Adapters\PDOAdapter', [
    ':dsn' => 'mysql:dbname=auryn;host=localhost',
    ':username' => 'root',
    ':passwd' => ''
]);

$container->alias('App\Database\Interfaces\Adapter', 'App\Database\Adapters\PDOAdapter');

// Dispatch a Request

$router = $container->make('App\Router\Router');
include 'routes.php';
$router->dispatch( $container );