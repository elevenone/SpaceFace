<?php

declare(strict_types=1);



echo '<pre>';
echo 'hi<br/>';
echo '<hr/><br/>';



/**
 * Request
 */

// php-request / pmjones
$request = new SapiRequest($GLOBALS);
// print_r($request);



/**
 * Routing
 */

 // AutoRiute / pmjones
 // 1. Instantiate the AutoRoute container class with the top-level HTTP action namespace 
 // and the directory path to classes in that namespace:
use AutoRoute\AutoRoute;

$autoRoute = new AutoRoute(
    'App\\Http',
    dirname(__DIR__) . '/App/Http/'
);

// set method
// $autoRoute->setMethod('exec');
// base url
// $autoRoute->setBaseUrl('/api');

// 2. Then, pull a new Router out of the container ...
$router = $autoRoute->newRouter();

// 3. ... and call route() with the HTTP request method verb
// and the path string to get back a Route, catching exceptions along the way:
try {
    // with php-request
    $route = $router->route($request->method, $request->url['path']);
    // $route = $router->route($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);

} catch (\AutoRoute\InvalidNamespace $e) {
    // 400 Bad Request
    http_response_code(400);
    die('Bad Request');

} catch (\AutoRoute\InvalidArgument $e) {
    // 400 Bad Request
    http_response_code(400);
    die('Bad Request');

} catch (\AutoRoute\NotFound $e) {
    // 404 Not Found
    http_response_code(404);
    die('404');

} catch (\AutoRoute\MethodNotAllowed $e) {
    // 405 Method Not Allowed
    http_response_code(405);
    die('Method not allowed');

}


// 
// $sender = new SapiResponseSender();
//



/**
 * Di Container
 */

// Aura Di
use Aura\Di\ContainerBuilder;
$builder = new ContainerBuilder();
$di = $builder->newInstance();



/**
 * Routing
 */

// presuming a DI-based Factory that can create new action class instances:
// $action = Factory::newInstance($route->class);
// $action = $di->newInstance($route->class);
$action = $di->lazyNew($route->class);

// $action = $di->set('route_service', $di->lazyNew($route->class));

// call the action instance with the method and params,
// presumably getting back an HTTP Response
$response = call_user_func([$action, $route->method], ...$route->params);


/*
if ( $route === 'error' ) {
    var_dump($route);
} else {



}

if (! $route) {
    echo "No route found for the request.";
    exit;
}



*/







//$generator = $autoRoute->newGenerator();

//use App\Http\Company\GetCompany;

//$path = $generator->generate(GetCompany::CLASS, '45');
//print_r($path);



echo '<br/><br/><hr/>';
echo '<br/>BYE';
echo '</pre>';
