<?php
/** 
 * Action
 * 
 * /project
 * /project/[1-9]
 * 
 */

namespace App\Http\Action\Project;

use SapiResponse as Response;
use SapiRequest as Request;
use App\Http\Domain\Project;
use App\Http\Action\Project\ProjectResponder;
use Aura\View\View as Template;

use Aura\View\TemplateRegistry;

class GetProject
{
    protected $domain;
    protected $responder;

    public function __construct()
    {

        $view = new Template(
            new TemplateRegistry(
                $array = [
                    'browse', '/Users/mikka/Desktop/spaceface-spacebase/app/views/browse.php',
                    '_item', '/Users/mikka/Desktop/spaceface-spacebase/app/views/_item.php'
                ]),
            new TemplateRegistry(
                $array = [
                    '/Users/mikka/Desktop/spaceface-spacebase/app/views/browse.php',
                    '/Users/mikka/Desktop/spaceface-spacebase/app/views/_item.php',
                    '/Users/mikka/Desktop/spaceface-spacebase/app/views/layouts/layout.php'
                ]),
            null
        );

        $view2 = new Template(
            new TemplateRegistry(
                $array = []),
            new TemplateRegistry(
                $array = []),
            null
        );

        // adr
        $domain = new Project();
        $responder = new ProjectResponder( $view2 );
        $this->domain = $domain;
        $this->responder = $responder;

        $this->request = new Request($GLOBALS);
    }

    public function __invoke(int $project_id = null)
    {
        // ...
        
        // check only if $project_id exists
        if ($project_id === null) {
            $payload = $this->domain->fetchAll();
        } else {
            $payload = $this->domain->fetchById($project_id);
        }

        return $this->responder->__invoke($this->request, $payload);

    }
}