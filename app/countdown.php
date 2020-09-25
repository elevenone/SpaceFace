<?php
/**
 * spacebase
 * project skeleton using AutoRoute
 */
declare(strict_types=1);



/**
 * Request
 */

// php-request / pmjones
$request = new SapiRequest($GLOBALS);
$response = new SapiResponse();

// print_r($request);



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
    'App\\Http',
    dirname(__DIR__) . '/App/Http/'
);

// set method
// $autoRoute->setMethod('run');

// base url
// $autoRoute->setBaseUrl('/api');

// 2.
// Then, pull a new Router out of the container ...
$router = $autoRoute->newRouter();

// 3.
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

// Di services
$service = $di->get('example_service_name');
var_dump($service);





/**
 * Routing
 */

// presuming a DI-based Factory that can create new action class instances:
// $action = Factory::newInstance($route->class);
$action = $di->newInstance($route->class);
// $action = $di->lazyNew($route->class); // lazy does not work with autoroute

// call the action instance with the method and params,
// presumably getting back an HTTP Response
// $response = call_user_func([$action, $route->method], ...$route->params);

// echo $response;

call_user_func([$action, $route->method], ...$route->params);



/*
$response->setHeader('Foo-Bar', 'baza');
var_dump($response->getHeader('Foo-Bar'));
var_dump($request->headers);
*/

//$sender = new SapiResponseSender( call_user_func([$action, $route->method], ...$route->params) );