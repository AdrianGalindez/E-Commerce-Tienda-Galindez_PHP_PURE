<?php

require_once __DIR__ . "/../config/Database.php";
require_once __DIR__ . "/../models/Brand.php";

class BrandController {

    private $model;

    public function __construct(){

        $database = new Database();
        $db = $database->connect();

        $this->model = new Brand($db);
    }

    public function index(){

        $stmt = $this->model->all();
        $brands = $stmt->fetchAll(PDO::FETCH_ASSOC);

       require_once __DIR__ . "/../views/ClientBrands.php";
    }

    public function create(){

        require __DIR__ . "/../views/BrandCreateView.php";
    }

    public function store(){

        $this->model->nombre = $_POST["nombre"];

        $this->model->create();

        header("Location: index.php?controller=brand&action=index");
    }

}