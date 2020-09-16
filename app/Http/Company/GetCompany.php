<?php


/* GET /company/{companyId} # get an existing company */
namespace App\Http\Company;

class GetCompany extends \App\App;
{
    public function __invoke(int $companyId)
    {
        // ...
        echo $companyId;
    }
}