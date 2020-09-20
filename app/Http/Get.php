<?php
/**
 * root action
 */
namespace App\Http;

class Get extends \App\Responder\AuraViewResponder
{




    public function __invoke()
    {
        // parent::__construct();
        $data = array('FFFFFCUKKKKK' => '89890648237452345634063465890368972382367872345625356234645756787698798796780890879089');

        parent::setData(
            $data
        );

        parent::setView(
            'index'
        );
        // ...
        // echo __CLASS__;
    }
}


