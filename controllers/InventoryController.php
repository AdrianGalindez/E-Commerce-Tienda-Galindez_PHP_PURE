<?php
// controllers/InventoryController.php

require_once "../models/Inventory.php";
require_once "../models/Product.php";

class InventoryController {

    private $model;
    private $productModel;

    public function __construct() {
        $this->model = new Inventory();
        $this->productModel = new Product();
    }

    // Listar todo el inventario
    public function index() {
        $inventory = $this->model->getAll();
        require "../views/InventoryIndexView.php";
    }

    // Mostrar formulario para agregar inventario
    public function create() {
        $products = $this->productModel->getAll();
        require "../views/InventoryCreateView.php";
    }

    // Guardar inventario
    public function store() {
        $data = [
            "product_id"   => $_POST["product_id"],
            "stock_actual" => $_POST["stock_actual"],
            "stock_minimo" => $_POST["stock_minimo"]
        ];

        $this->model->create($data);
        header("Location: index.php?controller=Inventory&action=index");
    }

    // Mostrar formulario para editar inventario
    public function edit() {
        $id = $_GET["id"];
        $inventoryItem = $this->model->getById($id);
        $products = $this->productModel->getAll();
        require "../views/InventoryEditView.php";
    }

    // Actualizar inventario
    public function update() {
        $data = [
            "id"           => $_POST["id"],
            "product_id"   => $_POST["product_id"],
            "stock_actual" => $_POST["stock_actual"],
            "stock_minimo" => $_POST["stock_minimo"]
        ];

        $this->model->update($data);
        header("Location: index.php?controller=Inventory&action=index");
    }

    // Eliminar inventario
    public function delete() {
        $id = $_GET["id"];
        $this->model->delete($id);
        header("Location: index.php?controller=Inventory&action=index");
    }
}