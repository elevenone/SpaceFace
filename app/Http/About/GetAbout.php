<?php


/* GET /company/{companyId} # get an existing company */
namespace App\Http\About;

class GetAbout extends \App\App
{
    public function __invoke()
    {
        // ...
        $this->view->setView('about');
    }
}