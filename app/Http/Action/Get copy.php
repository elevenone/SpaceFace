<?php
/**
 * root action
 */
namespace App\Http\Action;

use Aura\View\View as Template;

class Get
{
    protected $domain;
    protected $responder;

    public function __construct() // Template $template
    {
        $this->domain = new \App\Http\Domain\Index();
        $this->responder = new \App\Http\Responder\Fake();
        $this->request = new \SapiRequest($GLOBALS);
        // $this->payload = new \App\Http\Domain\Payload();

        // $this->template = $template;
    }

    public function __invoke()
    {
        $this->payload = $this->domain->FetchAll();
        return $this->responder->__invoke($this->request, $this->payload);
    }



    protected function registerTemplates() : void
    {
        $registry = $this->template->getViewRegistry();
        $path = dirname(dirname(dirname(__DIR__))) . '/resources/templates/blog';
        $files = glob("{$path}/*.php");
        foreach ($files as $file) {
            $name = substr(basename($file), 0, -4);
            $registry->set($name, $file);
        }
    }

    protected function renderTemplate($name) : void
    {
        $this->registerTemplates();
        $this->template->setView($name);
        $this->template->addData($this->payload->getResult());
        $this->response->getBody()->write($this->template->__invoke());
    }


    public function __destruct()
    {
        echo '<hr/>';
    }

}


