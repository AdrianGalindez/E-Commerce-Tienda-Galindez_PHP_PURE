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

    require "views/ClientCart.php";
    }

    // Agregar producto
    public function add(){

    if(!isset($_POST["product_id"])){
        die("Producto no especificado.");
    }

    $product_id = $_POST["product_id"];

    if(!isset($_SESSION["cart"])){
        $_SESSION["cart"] = [];
    }

    if(isset($_SESSION["cart"][$product_id])){
        $_SESSION["cart"][$product_id]["cantidad"]++;
    } else {
        $_SESSION["cart"][$product_id] = ["cantidad" => 1];
    }

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