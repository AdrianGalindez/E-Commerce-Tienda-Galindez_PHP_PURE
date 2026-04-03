<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

/*
|--------------------------------------------------------------------------
| Router MVC simple
|--------------------------------------------------------------------------
*/

$controller = $_GET['controller'] ?? 'Auth';
$action     = $_GET['action'] ?? 'login';

$controllerName = ucfirst($controller) . "Controller";

$controllerFile = "controllers/" . $controllerName . ".php";

if(!file_exists($controllerFile)){
    die("Controlador no encontrado");
}

require_once $controllerFile;

$controllerObject = new $controllerName();

if(!method_exists($controllerObject, $action)){
    die("Acción no encontrada");
}

$controllerObject->$action();