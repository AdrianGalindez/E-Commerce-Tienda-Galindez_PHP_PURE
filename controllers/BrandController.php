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
       require_once __DIR__ . "/../views/admin/brand/BrandIndexView.php";
    }

    public function create(){
        require __DIR__ . "/../views/admin/brand/BrandCreateView.php";
    }

    public function store(){
        $this->model->nombre = $_POST["nombre"];
        $this->model->create();
        header("Location: index.php?controller=brand&action=index");
    }

    public function edit(){
    if(!isset($_GET["id"])){
        die("ID no especificado");
    }
    $id = $_GET["id"];
    $brand = $this->model->find($id);
    require __DIR__ . "/../views/admin/brand/BrandEditView.php";
   }

   public function update(){

    if(!isset($_POST["id"]) || !isset($_POST["nombre"])){
        die("Datos incompletos");
    }
    $this->model->id = $_POST["id"];
    $this->model->nombre = $_POST["nombre"];
    $this->model->update();
    header("Location: index.php?controller=brand&action=index");
    exit;
    }
    
    public function delete(){
    if(!isset($_GET["id"])){
        die("ID no especificado");
    }
    $id = $_GET["id"];
    $this->model->delete($id);
    header("Location: index.php?controller=brand&action=index");
    exit;
    }


    public function show(){

    if(!isset($_GET['nombre'])){
        die("Marca no especificada");
    }

    $nombre = $_GET['nombre'];

    // 🔥 conectar con productos
    require_once __DIR__ . "/../models/Product.php";
    $database = new Database();
    $db = $database->connect();
    $productModel = new Product($db);

    // 🔎 buscar productos por marca
    $productos = $productModel->getByBrand($nombre);

    // 🔥 categorías para navbar
    $categorias = $productModel->getCategorias();

    // 🔥 imágenes
    require_once __DIR__ . "/../models/ProductImage.php";
    $imageModel = new ProductImage();

    foreach($productos as &$p){
        $imagenes = $imageModel->getAllByProductId($p['id']);
        $p['imagenes'] = $imagenes;
    }

    require __DIR__ . "/../views/client/ClientBrands.php";
}


public function shop(){

    $stmt = $this->model->all();
    $brands = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // 🔥 cargar categorías (navbar)
    require_once __DIR__ . "/../models/Product.php";
    $database = new Database();
    $db = $database->connect();
    $productModel = new Product($db);

    $categorias = $productModel->getCategorias();

    require __DIR__ . "/../views/client/ClientBrands.php";
}
}