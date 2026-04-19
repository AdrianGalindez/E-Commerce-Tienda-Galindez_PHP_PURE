<?php

require_once __DIR__ . "/../config/Database.php";
require_once __DIR__ . "/../models/User.php";
require_once __DIR__ . "/../models/Role.php";

class UserController {

    private $model;

    public function __construct(){

        $database = new Database();
        $db = $database->connect();

        $this->model = new User($db); // ✔ AQUÍ VA EL DB
    }

    public function index(){
        $stmt = $this->model->all();
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

        require __DIR__ . "/../views/admin/users/usersView.php";
    }

    public function create(){

        $roleModel = new Role((new Database())->connect());
        $roles = $roleModel->all();

        require __DIR__ . "/../views/admin/users/usersCreateView.php";
    }

    public function store(){

    if(empty($_POST["rol_id"])){
        $_POST["rol_id"] = 2; // cliente por defecto
    }

    $this->model->nombre = $_POST["nombre"];
    $this->model->email = $_POST["email"];
    $this->model->telefono = $_POST["telefono"];
    $this->model->password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $this->model->rol_id = $_POST["rol_id"];

    $this->model->create();

    header("Location: index.php?controller=user&action=index");
    }

    public function edit(){

        $id = $_GET["id"];

        $user = $this->model->find($id);

        require __DIR__ . "/../views/admin/users/usersEditView.php";
    }

    public function update(){

        $this->model->id = $_POST["id"];
        $this->model->nombre = $_POST["nombre"];
        $this->model->email = $_POST["email"];
        $this->model->telefono = $_POST["telefono"];

        $this->model->update();

        header("Location: index.php?controller=user&action=index");
    }

    public function delete(){

        $id = $_GET["id"];

        $this->model->delete($id);

        header("Location: index.php?controller=user&action=index");
    }
}