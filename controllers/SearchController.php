<?php
require_once __DIR__ . "/../config/Database.php";
require_once __DIR__ . "/../models/Product.php";

class SearchController {

    private $model;

    public function __construct(){
        $database = new Database();
        $db = $database->connect();
        $this->model = new Product($db);
    }

    public function index(){

        // 🔎 capturar búsqueda
        $q = $_GET['q'] ?? '';

        // 🔥 limpiar input
        $q = trim($q);

        if(empty($q)){
            $productos = [];
        } else {
            $productos = $this->model->search($q);
        }

        // categorías (para navbar)
        $categorias = $this->model->getCategorias();

        // 🔥 imágenes
        $this->attachImages($productos);

        require __DIR__ . "/../views/client/ClientSearch.php";
    }

    private function attachImages(&$productos){
        require_once __DIR__ . "/../models/ProductImage.php";
        $imageModel = new ProductImage();

        foreach($productos as &$p){
            $imagenes = $imageModel->getAllByProductId($p['id']);
            $p['imagenes'] = $imagenes;
        }
    }
}