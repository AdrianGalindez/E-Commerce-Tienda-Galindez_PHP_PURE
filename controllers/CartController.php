<?php

require_once "models/Cart.php";
require_once "config/database.php";

class CartController{

    private $model;

    public function __construct(){

        $database = new Database();
        $db = $database->connect();

        $this->model = new Cart($db);
    }

    // 🔹 Mostrar carrito
    public function index(){

        $user_id = $_SESSION["user_id"] ?? null;
        if(!$user_id){
            die("Usuario no logueado");
        }

        // Traer productos del carrito
        $productosCarrito = $this->model->getCart($user_id);

        // Calcular subtotal
        $subtotal = 0;
        if(!empty($productosCarrito)){
            foreach($productosCarrito as $item){
                $subtotal += $item['cantidad'] * $item['precio'];
            }
        }

        // Enviar variables a la vista
        require "views/ClientCart.php";
    }

    // 🔹 Agregar producto
    public function add(){
        $user_id = $_SESSION["user_id"] ?? null;
        if(!$user_id){
            die("Usuario no logueado");
        }

        if(!isset($_POST["product_id"])){
           die("Producto no especificado.");
        }

        $product_id = $_POST["product_id"];

        $this->model->addProduct($user_id, $product_id);

        header("Location: index.php?controller=cart&action=index");
        exit;
    }

    // 🔹 Eliminar producto
    public function delete(){
        if(!isset($_POST["producto_id"])){
            die("Producto no especificado para eliminar.");
        }

        $cart_id = $_SESSION["user_id"];
        $product_id = $_POST["producto_id"];

        // Aquí asumimos que tu modelo elimina por cart_id y product_id
        $this->model->removeByProductId($cart_id, $product_id);

        header("Location: index.php?controller=cart&action=index");
        exit;
    }
}