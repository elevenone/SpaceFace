<?php

namespace App\Space;

use Aura\Router\Route;
use Aura\Router\Rule\RuleInterface;
use Psr\Http\Message\ServerRequestInterface;



/**
 *
 * Does the server request method match an allowed route method?
 *
 * @param ServerRequestInterface $request The HTTP request.
 *
 * @param Route $route The route.
 *
 * @return bool True on success, false on failure.
 *
 */
class AsyncRule implements RuleInterface
{
    public function __invoke(ServerRequestInterface $request, Route $route)
    {
        $async = $request->getHeader('x-pfetch');

        if ($async) {
            echo __FILE__ . 'CCCC<br/>';
            return true;
        }

        $pass = isset($route->extras['layout'])
        && $route->extras['layout'];

        if ($pass) {
            $route->attributes(['aura/router:fake' => 'fake']);
        }

        // return $pass;
        echo 'aura router extras x-pfetch return value = ' . $route->extras['layout'] . '<br/>';


        // return false;
    }

    public function XXX(ServerRequestInterface $request, Route $route)
    {
        $versions = $request->getHeader('X-Api-Version');
        if (count($versions) !== 1) {
            return false;
        }

        $route->attributes(['apiVersion' => $versions[0]]);
        return true;
    }


}



/*
class FakeCustom implements RuleInterface
{
    public function __invoke(ServerRequestInterface $request, Route $route)
    {
        $pass = isset($route->extras['aura/router:fake'])
             && $route->extras['aura/router:fake'];

        if ($pass) {
            $route->attributes(['aura/router:fake' => 'fake']);
        }

        return $pass;
    }
}
*/