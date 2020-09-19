<?php

namespace App\Services;

use Aura\Di\Container;
use Aura\Di\ContainerConfig;

class Config extends ContainerConfig
{
    public function define(Container $di): void
    {
        $di->set('example_service_name', $di->lazyNew('App\Services\Example'));
    }

    public function modify(Container $di): void
    {
    }
}
