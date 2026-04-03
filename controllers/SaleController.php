<?php
// controllers/SaleController.php

require_once __DIR__ . "/../models/Sale.php";
require_once __DIR__ . "/../models/User.php";
require_once __DIR__ . "/../models/Order.php";
require_once __DIR__ . "/../config/Database.php";

class SaleController {

    private $model;
    private $userModel;
    private $orderModel;

    public function __construct() {

        // 🔥 Crear conexión
        $database = new Database();
        $db = $database->connect();

        // 🔥 Pasar conexión a TODOS los modelos
        $this->model = new Sale($db);
        $this->userModel = new User($db);
        $this->orderModel = new Order($db);
    }

    public function index() {
        $sales = $this->model->getAll();
        require __DIR__ . "/../views/SaleIndexView.php";
    }

    public function show() {
        $id = $_GET["id"];
        $sale = $this->model->getById($id);
        $user = $this->userModel->getById($sale["user_id"]);
        $orderItems = $this->orderModel->getItemsByOrder($sale["order_id"]);
        require __DIR__ . "/../views/SaleShowView.php";
    }
}