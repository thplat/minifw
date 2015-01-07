<?php 

error_reporting(E_ALL);

$container = new Auryn\Provider;

$providers = require_once 'config/providers.php';
foreach( $providers['providers'] AS $provider )
{
	(new $provider( $container ))->provide( $container );
}

$container->share('PDO');
$container->define('PDO', [
    ':dsn' => 'mysql:dbname=auryn;host=localhost',
    ':username' => 'root',
    ':passwd' => ''
]);

$router = $container->make('App\Router\Router');
include 'routes.php';
$router->dispatch( $container );