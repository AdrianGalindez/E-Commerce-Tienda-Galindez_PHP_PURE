<?php
// controllers/PaymentController.php

require_once "../models/Payment.php";
require_once "../models/Order.php";

class PaymentController {

    private $model;
    private $orderModel;

    public function __construct() {
        $this->model = new Payment();
        $this->orderModel = new Order();
    }

    // Listar todos los pagos
    public function index() {
        $payments = $this->model->getAll();
        require "../views/PaymentIndexView.php";
    }

    // Mostrar formulario para crear pago
    public function create() {
        $orders = $this->orderModel->getAll();
        require "../views/PaymentCreateView.php";
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
        require "../views/PaymentEditView.php";
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
        require "../views/PaymentShowView.php";
    }
}