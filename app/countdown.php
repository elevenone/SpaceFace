<?php
/**
 * project skeleton
 */
declare(strict_types=1);




/*
use Aura\View\ViewFactory;

$view_factory = new ViewFactory;
$view = $view_factory->newInstance();

// AURA views and templates
$view_registry = $view->getViewRegistry();
$layout_registry = $view->getLayoutRegistry();

// add templates to the view registry

$view_registry->set('browse',   dirname(__DIR__) . '/app/views/browse.php');         // the "main" template
$view_registry->set('_item',    dirname(__DIR__) . '/app/views/_item.php');           // the "sub" template

$layout_registry->set('layout', dirname(__DIR__) . '/app/views/layouts/layout.php');


$view->setData(array(
    'items' => array(
        array(
            'id' => '1',
            'name' => 'Foo',
        ),
        array(
            'id' => '2',
            'name' => 'Bar',
        ),
        array(
            'id' => '3',
            'name' => 'Baz',
        ),
    )
));

$view->setLayout('layout');
$view->setView('browse');
$output = $view->__invoke();                                            // or just $view()
echo $output;
*/



/**
 * Request
 * php-request / pmjones
 */


$request = new SapiRequest($GLOBALS);
$response = new SapiResponse();



/**
 * AutoRoute
 * 
 * Instantiate the AutoRoute container class
 * with the top-level HTTP action namespace
 * and the directory path to classes in that namespace:
 * use AutoRoute\AutoRoute;
 */
use AutoRoute\AutoRoute;

// 1 
$autoRoute = new AutoRoute(
    'App\\Http\\Action',
    dirname(__DIR__) . '/app/Http/Action/'
);

// $autoRoute->setMethod('run'); // set method
// $autoRoute->setBaseUrl('/api'); // base url



// Then, pull a new Router out of the container ...
$router = $autoRoute->newRouter();

// ... and call route() with the HTTP request method verb
// and the path string to get back a Route, catching exceptions along the way:
try {
    // with php-request
    $route = $router->route($request->method, $request->url['path']);
    // $route = $router->route($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);
} catch (\AutoRoute\InvalidNamespace $e) {
    // 400 Bad Request
    //http_response_code(400);
    $response->setCode(400);
    // print_r($response->getCode());
    die('Bad Request');

} catch (\AutoRoute\InvalidArgument $e) {
    // 400 Bad Request
    $response->setCode(400);
    die('Bad Request');

} catch (\AutoRoute\NotFound $e) {
    // 404 Not Found
    $response->setCode(404);
    die('404');

} catch (\AutoRoute\MethodNotAllowed $e) {
    // 405 Method Not Allowed
    $response->setCode(405);
    die('Method not allowed');
}



/**
 * Di Container
 */

// Aura Di
use Aura\Di\ContainerBuilder;

$container_builder = new ContainerBuilder();
// use the builder to create and configure a container
// using an array of ContainerConfig classes
$di = $container_builder->newConfiguredInstance([
    'App\Config'
]);





/**
 * Routing
 */

// presuming a DI-based Factory that can create new action class instances:
$action = $di->newInstance($route->class);
$response = call_user_func([$action, $route->method], ...$route->params);


/**
 * emit response
 */

// whe working with payloads
echo($response->getContent());

// else echo only
// echo($response);