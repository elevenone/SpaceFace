<?php

namespace App;

use Aura\Di\Container;
use Aura\Di\ContainerConfig;

class Config extends ContainerConfig
{
    public function define(Container $di): void
    {
        $di->params['App\Http\Demo\GetDemo']['mystring'] = 'baz 234234 53454325 435345342';
    }

    public function modify(Container $di): void
    {

    }
}
