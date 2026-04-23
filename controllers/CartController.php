<?php

require_once "config/database.php";
require_once "models/Product.php";
class CartController{

    private $model;
     
    // Mostrar carrito
    public function index(){
        
    $database = new Database();
    $db = $database->connect();
    $productModel = new Product($db);

    $cart = $_SESSION["cart"] ?? [];

    $productosCarrito = [];
    $subtotal = 0;

    foreach($cart as $product_id => $data){

        $producto = $productModel->getById($product_id);

        if($producto){
            $producto["cantidad"] = $data["cantidad"];
            $producto["subtotal"] = $producto["precio"] * $data["cantidad"];

            $subtotal += $producto["subtotal"];

            $productosCarrito[] = $producto;
        }
    }

    require "views/client/ClientCart.php";
    }

   // Agregar producto al carrito
public function add(){
    // Verifica que llegue el id del producto
    if(!isset($_POST["product_id"])){
        die("Producto no especificado.");
    }
    // Guarda id recibido desde formulario
    $product_id = $_POST["product_id"];
    // Si viene cantidad desde detalle la toma,
    // si no viene usa 1 (home)
    $cantidad = isset($_POST["cantidad"])
        ? (int) $_POST["cantidad"]
        : 1;
    // Evita cantidades inválidas
    if($cantidad < 1){
        $cantidad = 1;
    }
    // Si carrito no existe lo crea
    if(!isset($_SESSION["cart"])){
        $_SESSION["cart"] = [];
    }
    // Si producto ya existe suma cantidad
    if(isset($_SESSION["cart"][$product_id])){

        $_SESSION["cart"][$product_id]["cantidad"] += $cantidad;

    }else{
        // Si no existe lo agrega nuevo
        $_SESSION["cart"][$product_id] = [
            "cantidad" => $cantidad
        ];
    }
    // Redirecciona al carrito
    header("Location: index.php?controller=cart&action=index");
    exit;
}



    // Eliminar producto
    public function delete(){

    if(!isset($_POST["producto_id"])){
        die("Producto no especificado.");
    }

    $product_id = $_POST["producto_id"];

    if(isset($_SESSION["cart"][$product_id])){
        unset($_SESSION["cart"][$product_id]);
    }

    header("Location: index.php?controller=cart&action=index");
    exit;
    }
}