<?php
/**
 * root action
 */
namespace App\Http\Demo;

class GetDemo extends \App\App
{
    public function __construct(
        \ServerRequest $request,
        FooService $fooService
    ) {
        $this->request = $request;
        $this->fooService = $fooService;
    }



    public function exec()
    {
        // ...
        echo __CLASS__;
    }
}


