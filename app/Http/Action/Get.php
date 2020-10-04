<?php
/**
 * root action
 */
namespace App\Http\Action;

use SapiResponse as Response;
use SapiRequest as Request;

class Get
{


    public function __invoke()
    {
        echo 'root';
    }



}


