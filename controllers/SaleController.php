<?php
// controllers/SaleController.php

require_once "../models/Sale.php";
require_once "../models/User.php";
require_once "../models/Order.php";

class SaleController {

    private $model;
    private $userModel;
    private $orderModel;

    public function __construct() {
        $this->model = new Sale();
        $this->userModel = new User();
        $this->orderModel = new Order();
    }

    // Listar todas las ventas
    public function index() {
        $sales = $this->model->getAll();
        require "../views/SaleIndexView.php";
    }

    // Mostrar detalles de una venta específica
    public function show() {
        $id = $_GET["id"];
        $sale = $this->model->getById($id);
        $user = $this->userModel->getById($sale["user_id"]);
        $orderItems = $this->orderModel->getItemsByOrder($sale["order_id"]);
        require "../views/SaleShowView.php";
    }

    // Crear venta manual (opcional, normalmente se hace desde Checkout)
    public function create() {
        $users = $this->userModel->getAll();
        require "../views/SaleCreateView.php";
    }

    // Guardar nueva venta
    public function store() {
        $data = [
            "user_id" => $_POST["user_id"],
            "order_id" => $_POST["order_id"],
            "total" => $_POST["total"],
            "estado" => $_POST["estado"]
        ];
        $this->model->create($data);
        header("Location: index.php?controller=Sale&action=index");
    }

    // Editar venta
    public function edit() {
        $id = $_GET["id"];
        $sale = $this->model->getById($id);
        require "../views/SaleEditView.php";
    }

    // Actualizar venta
    public function update() {
        $data = [
            "id" => $_POST["id"],
            "estado" => $_POST["estado"],
            "total" => $_POST["total"]
        ];
        $this->model->update($data);
        header("Location: index.php?controller=Sale&action=index");
    }

    // Eliminar venta
    public function delete() {
        $id = $_GET["id"];
        $this->model->delete($id);
        header("Location: index.php?controller=Sale&action=index");
    }
}