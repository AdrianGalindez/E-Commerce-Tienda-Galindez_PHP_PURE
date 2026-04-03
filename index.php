<?php
session_start();
// 🔥 AGREGA ESTO (SI NO TIENES LOGIN)
if(!isset($_SESSION["user_id"])){
    $_SESSION["user_id"] = 1;
}
ini_set('display_errors', 1);
error_reporting(E_ALL);

/*
|--------------------------------------------------------------------------
| Router MVC simple
|--------------------------------------------------------------------------
*/

$controller = $_GET['controller'] ?? 'product';
$action     = $_GET['action'] ?? 'index';

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