<?php
/** 
 * Action
 * 
 * /project
 * /project/[1-9]
 * 
 */

namespace App\Http\Action\Page;

use SapiResponse as Response;
use SapiRequest as Request;
use App\Http\Domain\Page;
use App\Http\Action\Page\PageResponder;
use Aura\View\View as Template;

use Aura\View\TemplateRegistry;

class GetPage
{
    protected $domain;
    protected $responder;

    public function __construct()
    {
        $view = new Template(
            new TemplateRegistry(
                $array = []),
            new TemplateRegistry(
                $array = []),
            null
        );
        
        // adr
        $domain = new Page();
        $responder = new PageResponder( $view );
        $this->domain = $domain;
        $this->responder = $responder;

        $this->request = new Request($GLOBALS);
    }

    public function __invoke(string $page_slug = null)
    {
        // ...
        
        // check only if $project_id exists
        if ($page_slug === null) {
            $payload = $this->domain->fetchAll();
        } else {
            $payload = $this->domain->fetchById($page_slug);
        }

        return $this->responder->__invoke($this->request, $payload);

    }
}