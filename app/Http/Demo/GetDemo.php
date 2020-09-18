<?php
/**
 * root action
 */
namespace App\Http\Demo;

class GetDemo extends \App\App
{

    public $mystring;


    public function __construct($mystring)
    {
        parent::__construct();
        $this->mystring = $mystring;
    }

    public function setFoo($mystring2)
    {
        $this->mystring2 = $mystring2;
    }

    public function __invoke()
    {
        $data = array('mystring set __construct' => $this->mystring);
        $this->view->addData($data);
        $data = array('mystring2 set setFoo' => $this->mystring2);
        $this->view->addData($data);

        $this->view->setView('demo');
    }

    public function run()
    {
    }
}


