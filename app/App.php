<?php

namespace App;

class App
{
    public function __construct()
    {
        echo '<hr/><br/>';
        echo '/// ' . __METHOD__ . '<br/>';
        echo '<hr/><br/>';
    }

    public function __invoke()
    {
        // ...
        echo '<hr/><br/>';
        echo '/// ' . __METHOD__ . '<br/>';
        echo '<hr/><br/>';
    }

    public function __destruct()
    {
        echo '<hr/><br/>';
        echo '/// ' . __METHOD__ . '<br/>';
        echo '<hr/><br/>';
    }
}


