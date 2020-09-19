<?php

namespace App;

use Aura\Di\ConfigCollection;

class Config extends ConfigCollection
{
    public function __construct()
    {
        parent::__construct(
            [
                \App\Views\Config::class,
                \App\Services\Config::class
            ]
        );
    }
}