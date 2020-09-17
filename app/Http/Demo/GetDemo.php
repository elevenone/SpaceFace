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
        $this->mystring = $mystring;
    }

    public function setFoo($mystring2)
    {
        echo ' setFoo setFoo setFoo ';
        $this->mystring2 = $mystring2;
    }

    public function __invoke()
    {
        // ...
        echo '<br/>';
        echo __FILE__ . ' / ' . __CLASS__;
        echo '<br/>';
        echo 'mystring: ' . $this->mystring;
        echo 'mystring 2 : ' . $this->mystring2;
        echo '<br/>';
    }

    public function run()
    {
        // ...
        echo '<br/>';
        echo __FILE__ . ' / ' . __CLASS__;
        echo '<br/>';
        echo 'mystring: ' . $this->mystring;
        echo 'mystring 2 : ' . $this->mystring2;
        echo '<br/>';
    }
}


