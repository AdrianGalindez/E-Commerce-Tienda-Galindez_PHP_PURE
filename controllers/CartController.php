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

    public function index(){

        $cartItems = $this->model->getCart($_SESSION["user_id"]);

        $total = 0;
        foreach($cartItems as $item){
            $total += $item['cantidad'] * $item['precio'];
        }

        require "views/cartIndexView.php";
    }

    public function add(){

        $product_id = $_POST["product_id"];

        $this->model->addProduct($_SESSION["user_id"], $product_id);

        header("Location: index.php?controller=cart&action=index");
    }

    public function remove(){

        $this->model->remove($_GET["id"]);

        header("Location: index.php?controller=cart&action=index");
    }
}