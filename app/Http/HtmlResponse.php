<?php
declare(strict_types=1);

namespace App\Http;

/**
 * Class JsonResponse
 *
 * A response type that sets the content type to application/json and hands off a callback to json_encode data.
 *
 * @package Fagprove\Test\Http
 */
class HtmlResponse extends ResponseType
{


    protected function handleType(): callable
    {

        header('Content-type: text/html');


        return function ($returns) {

            return $returns;
        };
    }
}
