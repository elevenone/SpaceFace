<?php

namespace App\Http\Action;

use App\Http\Responder\AuraViewResponder;

class Responder extends AuraViewResponder
{

    // RESPONDER 1
    protected function found() : void
    {
        $this->renderTemplate('_index', 'layout');
    }

}
