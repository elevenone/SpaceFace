<?php

namespace App\Responder;

use Aura\Di\Container;
use Aura\Di\ContainerConfig;

class Config extends ContainerConfig
{
    public function define(Container $di): void
    {
        $di->params['Aura\View\TemplateRegistry']['paths'] = array(
            dirname(__DIR__) . '/Views',
        );

        $di->params['Aura\View\View'] = array(
            'view_registry'   => $di->lazyNew('Aura\View\TemplateRegistry'),
            'layout_registry' => $di->lazyNew('Aura\View\TemplateRegistry'),
        );

        $di->set('view', $di->lazyNew('Aura\View\View'));








        $di->params['App\Http\Demo\GetDemo']['mystring'] = 'In the dark of the night | Those small hours | Uncertain and anxious | I need to call you';
        $di->setters['App\Http\Demo\GetDemo']['setFoo'] = 'silencioso como una sombra';

        $di->params['App\Http\Demo2\GetDemo2']['mystring'] = 'In the dark of the night | Those small hours | Uncertain and anxious | I need to call you';
        $di->setters['App\Http\Demo2\GetDemo2']['setFoo'] = 'silencioso como una sombra';


    }

    public function modify(Container $di): void
    {
    }
}
