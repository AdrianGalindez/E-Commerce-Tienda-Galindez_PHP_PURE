<?php
require_once "config/Database.php";

$db = new Database();
$conexion = $db->connect();

if ($conexion) {
    echo "¡Conexión exitosa a la base de datos tienda_galindez en el puerto 3307!";
} else {
    echo "La conexión falló, pero el driver está instalado.";
}