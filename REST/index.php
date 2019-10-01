<?php
if (!isset($rootDir)){
	$rootDir = $_SERVER['DOCUMENT_ROOT'];
}

require_once 'Router.php';
require_once 'Route.php';
require_once 'Controller/UsuarioController.php';

$router = new Router($_SERVER['REQUEST_URI']);

$router->add('/', function ()
{
	return  "hola";
});

// $router->add('/productos', 'ProductsController::index');
// $router->add('/productos/:name', 'ProductsController::show');

// // /ruta/con/un/monton/de/parametros
// $router->add('/:a/:b/:c/:d/:e/:f', function ($a, $b, $c, $d, $e, $f)
// {
// 	return "$a<br>$b<br>$c<br>$d<br>$e<br>$f";
// });


$router->add('/usuarios','UsuarioController::all');
$router->add('/usuario/:id','UsuarioController::buscar');
$router->add('/usuario/:id','UsuarioController::buscar');
$router->add('/usuario/:id','UsuarioController::buscar');


$router->run();
