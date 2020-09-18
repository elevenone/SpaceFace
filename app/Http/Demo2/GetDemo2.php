<?php


/* GET /company/{companyId} # get an existing company */
namespace App\Http\Demo2;

class GetDemo2 extends \App\App
{
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

        // ...
        $this->view->setView('demo2');
    }
}