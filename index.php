<?php
session_start();

// Usuario por defecto (pruebas)
if(!isset($_SESSION["user_id"])){
    $_SESSION["user_id"] = 1;
}
$_SESSION['rol_id'] = 1;
// Mostrar errores
ini_set('display_errors', 1);
error_reporting(E_ALL);



// Autoload (modelos y controladores)
spl_autoload_register(function ($class) {
    if (file_exists("controllers/$class.php")) {
        require "controllers/$class.php";
    } elseif (file_exists("models/$class.php")) {
        require "models/$class.php";
    }
});

// Obtener parámetros
$controller = $_GET['controller'] ?? 'product';
$action = $_GET['action'] ?? 'index';



// PROTECCIÓN DE RUTAS ADMIN
if($controller == 'product' && $action == 'index'){
    if(!isset($_SESSION['rol_id']) || $_SESSION['rol_id'] != 1){
        $action = 'shop';
    }
}

// Formatear nombre
$controllerName = ucfirst($controller) . 'Controller';

// Validar existencia
if (!class_exists($controllerName)) {
    die("Controlador $controllerName no existe.");
}

// Instanciar
$controllerInstance = new $controllerName();

// Validar método
if (!method_exists($controllerInstance, $action)) {
    die("Acción $action no existe en $controllerName.");
}

// Ejecutar
$controllerInstance->$action();