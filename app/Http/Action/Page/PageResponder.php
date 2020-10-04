<?php

namespace App\Http\Action\Page;

use App\Http\Responder\AuraViewResponder;

class PageResponder extends AuraViewResponder
{

    // RESPONDER 1
    protected function found() : void
    {
        $this->renderTemplate('_page', 'layout');
    }

}
