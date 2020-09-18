<?php


/* GET /company/{companyId} # get an existing company */
namespace App\Http\About2;

class GetAbout2 extends \App\App
{
    public function __invoke()
    {
        // ...
        $this->view->setView('about');
    }
}