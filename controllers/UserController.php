<?php

require_once "../models/User.php";

class UserController{

    private $model;

    public function __construct(){
        $this->model = new User();
    }

    public function index(){

        $users = $this->model->getAll();

        require "../views/usersView.php";

    }

    public function create(){

        require "../views/usersCreateView.php";

    }

    public function store(){

        $data = [
            "nombre" => $_POST["nombre"],
            "email" => $_POST["email"],
            "telefono" => $_POST["telefono"],
            "password" => password_hash($_POST["password"], PASSWORD_DEFAULT)
        ];

        $this->model->create($data);

        header("Location: index.php?controller=user&action=index");

    }

    public function edit(){

        $id = $_GET["id"];

        $user = $this->model->getById($id);

        require "../views/usersEditView.php";

    }

    public function update(){

        $data = [
            "id" => $_POST["id"],
            "nombre" => $_POST["nombre"],
            "email" => $_POST["email"],
            "telefono" => $_POST["telefono"]
        ];

        $this->model->update($data);

        header("Location: index.php?controller=user&action=index");

    }

    public function delete(){

        $id = $_GET["id"];

        $this->model->delete($id);

        header("Location: index.php?controller=user&action=index");

    }

}