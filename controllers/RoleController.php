<?php

require_once __DIR__ . "/../config/Database.php";
require_once __DIR__ . "/../models/Role.php";

class RoleController {

    private $model;

    public function __construct(){
        $db = (new Database())->connect();
        $this->model = new Role($db);
    }

    public function index(){
        $stmt = $this->model->all();
        $roles = $stmt->fetchAll(PDO::FETCH_ASSOC);

        require __DIR__ . "/../views/admin/roles/index.php";
    }

    public function create(){
        require __DIR__ . "/../views/admin/roles/create.php";
    }

    public function store(){

        if(!isset($_POST["nombre"])) die("Nombre requerido");

        $this->model->nombre = $_POST["nombre"];
        $this->model->create();

        header("Location: index.php?controller=role&action=index");
        exit;
    }

    public function edit(){

        if(!isset($_GET["id"])) die("ID requerido");

        $role = $this->model->find($_GET["id"]);

        require __DIR__ . "/../views/admin/roles/edit.php";
    }

    public function update(){

        if(!isset($_POST["id"], $_POST["nombre"])) die("Datos incompletos");

        $this->model->id = $_POST["id"];
        $this->model->nombre = $_POST["nombre"];

        $this->model->update();

        header("Location: index.php?controller=role&action=index");
        exit;
    }

    public function delete(){

        if(!isset($_GET["id"])) die("ID requerido");

        $this->model->delete($_GET["id"]);

        header("Location: index.php?controller=role&action=index");
        exit;
    }
}