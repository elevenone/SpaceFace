<?php

namespace App;

use Aura\View\ViewFactory;


class App
{
    public function __construct()
    {
        


        $view_factory = new ViewFactory;
        $this->view = $view_factory->newInstance();


        // AURA views and templates
        $view_registry = $this->view->getViewRegistry();
        $layout_registry = $this->view->getLayoutRegistry();

        // views
        $view_registry->set("index",          "app/views/index.php");
        $view_registry->set("about",          "app/views/about.php");
        $view_registry->set("impressum",      "app/views/impressum.php");

        // templates / partials
        $layout_registry->set("_navigation",  "app/views/_navigation.php");
        $layout_registry->set("_footer",      "app/views/_footer.php");

        // templates / layout
        $layout_registry->set("layout",       "app/views/layout.php");

        $this->view->setData([
            'name' => 'DATA FROM run.php',
            'items' => [
                [
                    'id' => '1',
                    'name' => 'Foo',
                ],
                [
                    'id' => '2',
                    'name' => 'Bar',
                ],
                [
                    'id' => '3',
                    'name' => 'Baz',
                ],
            ],
        ]);


        $data = ['GRRRR' => '56234645756787698798796780890879089'];
        $this->view->addData($data);




        



    }

    public function __invoke()
    {
    }

    public function __destruct()
    {
        // $this->view = $view;
        // $this->view->setView('index');
        $this->view->setLayout('layout');
        $output = $this->view->__invoke(); // or just $view()
        
        echo $output;

    }
}


