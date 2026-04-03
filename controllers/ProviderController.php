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

        require __DIR__ . "/../views/ProviderIndexView.php";
    }

    public function create(){

        require __DIR__ . "/../views/ProviderCreateView.php";
    }

    public function store(){

        $this->model->nombre = $_POST["nombre"];
        $this->model->telefono = $_POST["telefono"];
        $this->model->direccion = $_POST["direccion"];

        $this->model->create();

        header("Location: index.php?controller=provider&action=index");
    }

    public function edit(){

        require __DIR__ . "/../views/ProviderEditView.php";
    }
}