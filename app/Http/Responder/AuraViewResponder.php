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

    public function isAsync()
    {
        //if ( isset($_SERVER['HTTP_X_PFETCH'] )) {
        if ( isset( $this->request->server['HTTP_X_PFETCH'] )) {
			return true;
		}

        return false;
    }
    


    protected function registerTemplates() : void
    {
        $viewspath = dirname(dirname(__DIR__));

        $registry = $this->template->getViewRegistry();

        // layout
        $layout_registry = $this->template->getLayoutRegistry(); // zzz
        $layout_registry->set('layout', $viewspath . '/views/layouts/layout.php');

        // partials
        $layout_registry->set('_navigation', $viewspath. '/views/_partials/_navigation.php');
        $layout_registry->set('_footer', $viewspath . '/views/_partials/_footer.php');


        $path = $viewspath . '/views';

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


        if ($this->isAsync() === false) {
            $this->template->setLayout($layout);
        }

        // $this->template->setLayout($layout);



        $this->template->setView($name);
        $this->template->addData($this->payload->getResult());

        // response
        $this->response = $this->response->setCode(200);
        $this->response->setContent($this->template->__invoke());
    }
}

