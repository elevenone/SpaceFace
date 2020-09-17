<?php
/**
 * root action
 */
namespace App\Http\Demo;

class GetDemo extends \App\App
{

    public $mystring;


    public function __construct($mystring)
    {
        echo ' __construct __construct __construct ';
        $this->mystring = $mystring;
    }

    public function setFoo($mystring)
    {
        echo ' setFoo setFoo setFoo ';
        $this->mystring = $mystring;
    }

    public function __invoke()
    {
        // ...
        echo '<br/>';
        echo __FILE__ . ' / ' . __CLASS__;
        echo '<br/>';
        echo 'mystring: ' . $this->mystring;
        echo '<br/>';
    }
}


