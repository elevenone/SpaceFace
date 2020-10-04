<?php

namespace App;

use Aura\Di\Container;
use Aura\Di\ContainerConfig;
use AutoRoute\AutoRoute;

class Config extends ContainerConfig
{
    public function define(Container $di): void
    {

      //  $di->params[$route->class]['paths'] = array(
      //      dirname(__DIR__) . '/Views',
     //   );


        $di->params['Aura\View\TemplateRegistry']['paths'] = array(
            dirname(__DIR__) . '/Views',
        );

        $di->params['Aura\View\View'] = array(
            'view_registry'   => $di->lazyNew('Aura\View\TemplateRegistry'),
            'layout_registry' => $di->lazyNew('Aura\View\TemplateRegistry'),
        );

        $di->set('view', $di->lazyNew('Aura\View\View'));
    }

    public function modify(Container $di): void
    {
    }
}
