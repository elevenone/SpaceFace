<?php
/**
 * root action
 */
namespace App\Http;

class Get extends \App\App
{




    public function __invoke()
    {
        // parent::__construct();
        $data = array('FFFFFCUKKKKK' => '89890648237452345634063465890368972382367872345625356234645756787698798796780890879089');


        $this->view->addData($data);
        // print_r($this->view);

        // ...
        // echo __CLASS__;
    }
}


