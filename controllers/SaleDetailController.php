<?php
// controllers/SaleDetailController.php

require_once "../models/Order.php";
require_once "../models/Product.php";

class SaleDetailController {

    private $orderModel;
    private $productModel;

    public function __construct() {
        $this->orderModel = new Order();
        $this->productModel = new Product();
    }

    // Listar todos los detalles de todas las ventas
    public function index() {
        $orderItems = $this->orderModel->getAllItems(); // Método que obtiene todos los detalles de órdenes
        require "../views/SaleDetailIndexView.php";
    }

    // Mostrar los detalles de una venta específica
    public function show() {
        $order_id = $_GET["order_id"];
        $items = $this->orderModel->getItemsByOrder($order_id); // Productos de la orden
        require "../views/SaleDetailShowView.php";
    }

    // Crear un detalle de venta manual (opcional)
    public function create() {
        $products = $this->productModel->getAll();
        require "../views/SaleDetailCreateView.php";
    }

    // Guardar detalle de venta
    public function store() {
        $data = [
            "order_id" => $_POST["order_id"],
            "product_id" => $_POST["product_id"],
            "cantidad" => $_POST["cantidad"],
            "precio" => $_POST["precio"]
        ];

        $this->orderModel->addItem($data); // Método para insertar detalle
        header("Location: index.php?controller=SaleDetail&action=index");
    }

    // Editar detalle de venta
    public function edit() {
        $id = $_GET["id"];
        $item = $this->orderModel->getItemById($id);
        $products = $this->productModel->getAll();
        require "../views/SaleDetailEditView.php";
    }

    // Actualizar detalle de venta
    public function update() {
        $data = [
            "id" => $_POST["id"],
            "cantidad" => $_POST["cantidad"],
            "precio" => $_POST["precio"]
        ];

        $this->orderModel->updateItem($data);
        header("Location: index.php?controller=SaleDetail&action=index");
    }

    // Eliminar detalle de venta
    public function delete() {
        $id = $_GET["id"];
        $this->orderModel->deleteItem($id);
        header("Location: index.php?controller=SaleDetail&action=index");
    }

}