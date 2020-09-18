<?php

namespace App;

use Aura\Di\Container;
use Aura\Di\ContainerConfig;

class DemoConfig extends ContainerConfig
{
    public function define(Container $di): void
    {
        $di->params['App\Http\Demo\GetDemo']['mystring'] = 'In the dark of the night | Those small hours | Uncertain and anxious | I need to call you';
        $di->setters['App\Http\Demo\GetDemo']['setFoo'] = 'silencioso como una sombra';

        $di->params['App\Http\Demo2\GetDemo2']['mystring'] = 'In the dark of the night | Those small hours | Uncertain and anxious | I need to call you';
        $di->setters['App\Http\Demo2\GetDemo2']['setFoo'] = 'silencioso como una sombra';

        $di->set('example_service_name', $di->lazyNew('App\Example'));


        // $di->params[] = new ;
    }

    public function modify(Container $di): void
    {
    }
}
