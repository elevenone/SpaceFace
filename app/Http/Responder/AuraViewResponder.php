<?php
namespace App\Http\Responder;

use SapiRequest as Request;
use SapiResponse as Response;

use App\Http\Domain\Payload;

use App\Http\Responder\Responder;
use Aura\View\View as Template;
use App\Http\Responder\AbstractResponder;

class AuraViewResponder extends AbstractResponder
{
    // RESPONDER 2
    public function __construct(Template $template)
    {
        $this->template = $template;
    }

    protected function registerTemplates() : void
    {
        $registry = $this->template->getViewRegistry();

        // layout
        $layout_registry = $this->template->getLayoutRegistry(); // zzz


        $layout_registry->set('layout', dirname(dirname(__DIR__)) . '/views/layouts/layout.php');


        $path = dirname(dirname(__DIR__)) . '/views';

        $files = glob("{$path}/*.php");
        foreach ($files as $file) {
            $name = substr(basename($file), 0, -4);
            $registry->set($name, $file);
        }
    }

    // aura rendering view and layout
    protected function renderTemplate($name, $layout) : void
    {
        // aura view
        $this->registerTemplates();
        $this->template->setLayout($layout);
        $this->template->setView($name);
        $this->template->addData($this->payload->getResult());

        // response
        $this->response = $this->response->setCode(200);
        $this->response->setContent($this->template->__invoke());
    }
}

