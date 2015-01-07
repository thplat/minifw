<?php
namespace App\Environment;

use Whoops\Handler\PrettyPageHandler;
use Whoops\Run;

class EnvironmentConfigurator {

    protected $environment;

    public function __construct( $environment )
    {
        $this->environment = $environment;
    }

    public function configure()
    {
        $whoops = new Run;
        if ($this->environment !== 'production')
            $whoops->pushHandler(new PrettyPageHandler);
        $whoops->register();
    }

} 