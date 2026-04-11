<?php

require_once __DIR__ . "/../config/Database.php";
require_once __DIR__ . "/../models/Category.php";

class CategoryController {

    private $model;

    public function __construct(){

        $database = new Database();
        $db = $database->connect();

        $this->model = new Category($db);
    }

    public function index(){

        $stmt = $this->model->all();

        $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);

        require __DIR__ . "/../views/CategoryIndexView.php";
    }

    public function create(){

        require __DIR__ . "/../views/CategoryCreateView.php";
    }

    public function store(){

        $this->model->nombre = $_POST["nombre"];

        $this->model->create();

        header("Location: index.php?controller=category&action=index");
    }

    public function delete(){

    if(!isset($_POST["id"])){
        die("ID no especificado");
    }

    $id = $_POST["id"];

    $this->model->delete($id);

    header("Location: index.php?controller=category&action=index");
    exit;
    }

}