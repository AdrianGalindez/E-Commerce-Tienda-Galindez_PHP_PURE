<?php
require_once __DIR__ . "/../config/Database.php";
require_once __DIR__ . "/../models/Product.php";

class ProductController{

    private $model;

    public function __construct(){

        $database = new Database();
        $db = $database->connect();

        $this->model = new Product($db);
    }

    public function index(){

        $products = $this->model->all();

        require __DIR__ . "/../views/ProductIndexView.php";

    }

    public function create(){

        require __DIR__ . "/../views/ProductCreateView.php";

    }

    public function store(){

        $data = [

            "nombre" => $_POST["nombre"],
            "descripcion" => $_POST["descripcion"],
            "precio" => $_POST["precio"],
            "stock" => $_POST["stock"],
            "categoria_id" => $_POST["categoria_id"],
            "marca_id" => $_POST["marca_id"]

        ];

        $this->model->create($data);

        header("Location: index.php?controller=product&action=index");

    }

    public function edit(){

        $id = $_GET["id"];

        $product = $this->model->getById($id);

        require __DIR__ . "/../views/productsEditView.php";

    }

    public function update(){

        $data = [

            "id" => $_POST["id"],
            "nombre" => $_POST["nombre"],
            "descripcion" => $_POST["descripcion"],
            "precio" => $_POST["precio"],
            "stock" => $_POST["stock"]

        ];

        $this->model->update($data);

        header("Location: index.php?controller=product&action=index");

    }

    public function delete(){

        $id = $_GET["id"];

        $this->model->delete($id);

        header("Location: index.php?controller=product&action=index");

    }

}