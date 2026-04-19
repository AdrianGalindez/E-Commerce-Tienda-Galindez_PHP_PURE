<?php

require_once __DIR__ . "/../config/Database.php";
require_once __DIR__ . "/../models/Provider.php";

class ProviderController {

    private $model;

    public function __construct(){
        $database = new Database();
        $db = $database->connect();
        $this->model = new Provider($db);
    }

    public function index(){
        $providers = $this->model->all();
        require __DIR__ . "/../views/admin/providers/ProviderIndexView.php";
    }

    public function create(){
        require __DIR__ . "/../views/admin/providers/ProviderCreateView.php";
    }

    public function store(){

        if(!isset($_POST["nombre"], $_POST["telefono"], $_POST["direccion"])){
            die("Datos incompletos");
        }

        $this->model->nombre = $_POST["nombre"];
        $this->model->telefono = $_POST["telefono"];
        $this->model->direccion = $_POST["direccion"];

        $this->model->create();

        header("Location: index.php?controller=provider&action=index");
        exit;
    }

    public function edit(){
    
        if(!isset($_GET["id"])){
            die("ID no especificado");
        }
    
        $id = $_GET["id"];
    
        $provider = $this->model->find($id);
    
        require __DIR__ . "/../views/admin/providers/ProviderEditView.php";
    }

    public function update(){
        if(!isset($_POST["id"], $_POST["nombre"], $_POST["telefono"], $_POST["direccion"])){
            die("Datos incompletos");
        }

        $this->model->id = $_POST["id"];
        $this->model->nombre = $_POST["nombre"];
        $this->model->telefono = $_POST["telefono"];
        $this->model->direccion = $_POST["direccion"];
        $this->model->update();

        header("Location: index.php?controller=provider&action=index");
        exit;
    }

    public function delete(){
        if(!isset($_GET["id"])){
            die("ID no especificado");
        }
        $id = $_GET["id"];
        $this->model->delete($id);
        header("Location: index.php?controller=provider&action=index");
        exit;
    }
}