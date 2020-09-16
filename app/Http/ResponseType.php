<?php

declare(strict_types=1);

namespace App\Http;

/**
 * Class ResponseType
 * A simple abstract class intended to be use to wrap reusable logic for different responses @see JsonResponse
 *
 * @package Fagprove\Test\Http
 */
abstract class ResponseType
{

    abstract protected function handleType() : callable;

}
