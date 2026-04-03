<?php
// index.php (o routes.php)

session_start();

// Autocarga básica de modelos y controladores
spl_autoload_register(function ($class) {
    if (file_exists("controllers/$class.php")) {
        require "controllers/$class.php";
    } elseif (file_exists("models/$class.php")) {
        require "models/$class.php";
    }
});

// Obtener controlador y acción desde la URL
$controller = isset($_GET['controller']) ? $_GET['controller'] : 'Product';
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

// Convertir a formato correcto de controlador
$controller = ucfirst($controller) . 'Controller';

// Verificar que la clase exista
if (!class_exists($controller)) {
    die("Controlador $controller no existe.");
}

// Instanciar el controlador
$controllerInstance = new $controller();

// Verificar que el método exista
if (!method_exists($controllerInstance, $action)) {
    die("Acción $action no existe en el controlador $controller.");
}

// Llamar al método
$controllerInstance->$action();