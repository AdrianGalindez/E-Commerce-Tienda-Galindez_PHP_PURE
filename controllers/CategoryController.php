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
        require __DIR__ . "/../views/admin/category/CategoryIndexView.php";
    }

    public function create(){
        require __DIR__ . "/../views/admin/category/CategoryCreateView.php";
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

    if($this->model->hasProducts($id)){
        header("Location: index.php?controller=category&action=index");
        die("No puedes eliminar esta categoría porque tiene productos asociados");
    }

    $this->model->delete($id);

    header("Location: index.php?controller=category&action=index");
    exit;
    }

    public function edit(){

    if(!isset($_GET["id"])){
        die("ID no especificado");
    }

    $id = $_GET["id"];
    $category = $this->model->find($id);
    require __DIR__ . "/../views/admin/category/CategoryEditView.php";
    }

    public function update(){

    if(!isset($_POST["id"]) || !isset($_POST["nombre"])){
        die("Datos incompletos");
    }

    $this->model->id = $_POST["id"];
    $this->model->nombre = $_POST["nombre"];

    $this->model->update();

    header("Location: index.php?controller=category&action=index");
    exit;
    }

}