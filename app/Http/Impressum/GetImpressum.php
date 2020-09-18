<?php


/* GET /company/{companyId} # get an existing company */
namespace App\Http\Impressum;

class GetImpressum extends \App\App
{
    public function __invoke()
    {
        // ...
        $this->view->setView('impressum');
    }
}