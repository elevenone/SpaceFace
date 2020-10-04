<?php

namespace App\Http\Action\Project;

use SapiRequest as Request;
use SapiResponse as Response;

use App\Http\Domain\Payload;

use App\Http\Responder\Responder;
use Aura\View\View as Template;

use Exception;

class ProjectResponder
{

    // RESPONDER 1
    // rendering view
    protected function found() : void
    {
        // $this->template->setLayout('layout');
        $this->renderTemplate('_browse_projects', 'layout');
    }

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
        $layout_registry->set('layout', dirname(dirname(dirname(__DIR__))) . '/views/layouts/layout.php');


        $path = dirname(dirname(dirname(__DIR__))) . '/views';

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



    // RESPONDER 3
    // abstract class responder
    protected $request;

    protected $response;

    protected $payload;

    public function __invoke(Request $request, Payload $payload) : Response
    {
        $this->request = $request;
        $this->payload = $payload;
        $this->response = $this->newResponse();

        $method = $this->getMethodForPayload();
        $this->$method();
        return $this->response;
    }

    protected function newResponse()
    {
        return new Response();
    }

    protected function getMethodForPayload() : string
    {
        $method = str_replace('_', '', strtolower($this->payload->getStatus()));
        return method_exists($this, $method) ? $method : 'notRecognized';
    }

    protected function notRecognized() : void
    {
        $domain_status = $this->payload->getStatus();
        $this->response = $this->response->withStatus(500);
        $this->response->getBody()->write("Unknown domain payload status: '$domain_status'");
    }

    protected function notFound() : void
    {
        $this->response = $this->response->withStatus(404);
        $this->response->getBody()->write("<html><head><title>404 Not Found</title></head><body>404 Not Found</body></html>");
    }

    protected function error() : void
    {
        $e = $this->payload->getResult()['exception'];
        $this->response = $this->response->withStatus(500);
        $this->response->getBody()->write($e->getMessage());
    }

}
