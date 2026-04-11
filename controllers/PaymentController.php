<?php
// controllers/PaymentController.php

require_once "models/Payment.php";
require_once "models/Order.php";
require_once "models/Cart.php";
require_once "config/database.php";
require_once "models/User.php";
class PaymentController {

    private $model;
    private $orderModel;

    public function __construct() {

    $database = new Database();
    $db = $database->connect();

    $this->model = new Payment($db);
    $this->orderModel = new Order($db);
}

    // Listar todos los pagos
    public function index() {
        $payments = $this->model->getAll();
        require "views/PaymentIndexView.php";
    }

    // Mostrar formulario para crear pago
    public function create() {
        $orders = $this->orderModel->getAll();
        require "views/PaymentIndexView.php";
    }

    // Guardar un nuevo pago
    public function store() {
        $data = [
            "order_id" => $_POST["order_id"],
            "metodo"   => $_POST["metodo"],
            "estado"   => $_POST["estado"]
        ];

        $this->model->create($data);
        header("Location: index.php?controller=Payment&action=index");
    }

    // Mostrar formulario para editar pago
    public function edit() {
        $id = $_GET["id"];
        $payment = $this->model->getById($id);
        $orders = $this->orderModel->getAll();
        require "views/PaymentEditView.php";
    }

    // Actualizar pago
    public function update() {
        $data = [
            "id"       => $_POST["id"],
            "order_id" => $_POST["order_id"],
            "metodo"   => $_POST["metodo"],
            "estado"   => $_POST["estado"]
        ];

        $this->model->update($data);
        header("Location: index.php?controller=Payment&action=index");
    }

    // Eliminar pago
    public function delete() {
        $id = $_GET["id"];
        $this->model->delete($id);
        header("Location: index.php?controller=Payment&action=index");
    }

    // Ver detalles de un pago
    public function show() {
        $id = $_GET["id"];
        $payment = $this->model->getById($id);
        require "views/PaymentShowView.php";
    }

    public function checkout(){

    $user_id = $_SESSION["user_id"];

    $database = new Database();
    $db = $database->connect();

    // MODELOS
    $cartModel = new Cart($db);
    $userModel = new User($db);

    // 🛒 CARRITO
    $cartItems = $cartModel->getCart($user_id);

    // 👤 USUARIO
    $user = $userModel->find($user_id);

    // 💰 TOTAL
    $total = 0;
    foreach($cartItems as $item){
        $total += $item["cantidad"] * $item["precio"];
    }

    require "views/PaymentIndexView.php";
    }  
}