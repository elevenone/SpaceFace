<?php

declare(strict_types=1);

namespace App\Responder;

use Aura\View\ViewFactory;
use Aura\Di\Container;
use Aura\Di\ContainerConfig;
use Aura\Di\ContainerBuilder;

class AuraviewResponder
{
    public function __construct()
    {
        


        $view_factory = new ViewFactory;
        $this->view = $view_factory->newInstance();


        // AURA views and templates
        $view_registry = $this->view->getViewRegistry();
        $layout_registry = $this->view->getLayoutRegistry();

        // views
        $view_registry->set("index",            "app/views/index.php");
        $view_registry->set("about",            "app/views/about.php");
        $view_registry->set("impressum",        "app/views/impressum.php");
        $view_registry->set("demo",             "app/views/demo.php");
        $view_registry->set("demo2",            "app/views/demo2.php");

        // templates / partials
        $layout_registry->set("_navigation",    "app/views/_navigation.php");
        $layout_registry->set("_footer",        "app/views/_footer.php");

        // templates / layout
        $layout_registry->set("layout",         "app/views/layout.php");

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

    public function setView($file)
    {
        $this->file = $file;
    }

    public function setData($data)
    {
        $this->view->addData($data);
    }

    public function __destruct()
    {

        $builder = new ContainerBuilder();
        $di = $builder->newInstance();

        echo 'example_service_nameexample_service_nameexample_service_nameexample_service_nameexample_service_name >>>';
        // $di->get('example_service_name');

        // $container->get;
      
        // get a service; the first get() will lock the container
        //$service = $di->get('example_service_name');

        // the two service objects are the same
        //var_dump($service); // true

        echo '<<< example_service_nameexample_service_nameexample_service_nameexample_service_nameexample_service_name';



        // $this->view = $view;
        // $this->view->setView('index');
        $this->view->setView($this->file);
        $this->view->setLayout('layout');
        $output = $this->view->__invoke(); // or just $view()
        
        echo $output;

    }
}


