<?php
// controllers/ProductImageController.php

require_once "../models/ProductImage.php";
require_once "../models/Product.php";

class ProductImageController {

    private $model;
    private $productModel;

    public function __construct() {
        $this->model = new ProductImage();
        $this->productModel = new Product();
    }

    // Listar todas las imágenes
    public function index() {
        $images = $this->model->getAll();
        require "../views/ProductImageIndexView.php";
    }

    // Mostrar formulario para agregar imagen
    public function create() {
        $products = $this->productModel->getAll();
        require "../views/ProductImageCreateView.php";
    }

    // Guardar imagen nueva
    public function store() {
        // Validar que se haya subido un archivo
        if(isset($_FILES["image"]) && $_FILES["image"]["error"] == 0){
            $targetDir = "../uploads/";
            $fileName = time() . "_" . basename($_FILES["image"]["name"]);
            $targetFile = $targetDir . $fileName;

            if(move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)){
                $data = [
                    "product_id" => $_POST["product_id"],
                    "url"        => "uploads/" . $fileName
                ];
                $this->model->create($data);
            }
        }
        header("Location: index.php?controller=ProductImage&action=index");
    }

    // Mostrar formulario para editar imagen
    public function edit() {
        $id = $_GET["id"];
        $image = $this->model->getById($id);
        $products = $this->productModel->getAll();
        require "../views/ProductImageEditView.php";
    }

    // Actualizar imagen
    public function update() {
        $data = [
            "id" => $_POST["id"],
            "product_id" => $_POST["product_id"]
        ];

        // Validar si se subió nueva imagen
        if(isset($_FILES["image"]) && $_FILES["image"]["error"] == 0){
            $targetDir = "../uploads/";
            $fileName = time() . "_" . basename($_FILES["image"]["name"]);
            $targetFile = $targetDir . $fileName;
            if(move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)){
                $data["url"] = "uploads/" . $fileName;
            }
        }

        $this->model->update($data);
        header("Location: index.php?controller=ProductImage&action=index");
    }

    // Eliminar imagen
    public function delete() {
        $id = $_GET["id"];
        $this->model->delete($id);
        header("Location: index.php?controller=ProductImage&action=index");
    }

    // Mostrar detalle de imagen
    public function show() {
        $id = $_GET["id"];
        $image = $this->model->getById($id);
        require "../views/ProductImageShowView.php";
    }
}