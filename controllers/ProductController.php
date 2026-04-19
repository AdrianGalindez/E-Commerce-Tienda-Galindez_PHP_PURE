<?php
require_once __DIR__ . "/../config/Database.php";
require_once __DIR__ . "/../models/Product.php";

class ProductController {

    private $model;

    public function __construct(){
        $database = new Database();
        $db = $database->connect();
        $this->model = new Product($db);
    }


    // CLIENTE - TIENDA
    public function shop(){
        $productos = $this->model->all();
        $categorias = $this->model->getCategorias();
        // Agregar imágenes
        $this->attachImages($productos);
        require __DIR__ . "/../views/client/ClientIndex.php";
    }

    // CLIENTE - DETALLE
    public function show(){
        $id = $_GET["id"];
        $product = $this->model->getById($id);
        require_once __DIR__ . "/../models/ProductImage.php";
        $imageModel = new ProductImage();
        $imagenes = $imageModel->getAllByProductId($id);
        $product['fotos'] = array_column($imagenes, 'url');
        require __DIR__ . "/../views/client/product/ClientDetailProduct.php";
    }

    // ADMIN - LISTADO (CRUD)
    public function index(){
        $this->checkAdmin();
        $productos = $this->model->all();
        require __DIR__ . "/../views/client/ClientIndex.php";
    }

    public function indexAdmin(){
        $this->checkAdmin();
        $productos = $this->model->all();
        require __DIR__ . "/../views/admin/product/ProductIndexView.php";
    }

    // ADMIN - CREAR
    public function create(){
        $this->checkAdmin();
        $categorias = $this->model->getCategorias();
        $marcas = $this->model->getMarcas(); // si lo creas
        require __DIR__ . "/../views/admin/product/ProductCreateView.php";
    }

    public function store(){
        $this->checkAdmin();
    
        $this->model->nombre = $_POST["nombre"];
        $this->model->descripcion = $_POST["descripcion"];
        $this->model->precio = $_POST["precio"];
        $this->model->stock = $_POST["stock"];
        $this->model->categoria_id = $_POST["categoria_id"];
        $this->model->marca_id = $_POST["marca_id"];
        $this->model->proveedor_id = $_POST["proveedor_id"] ?? null;
    
        if($this->model->create()){
            header("Location: index.php?controller=product&action=indexAdmin");
            exit;
        } else {
            echo "Error al crear producto";
        }
    }

    // ADMIN - EDITAR
    public function edit(){
        $this->checkAdmin();
        $id = $_GET["id"];
        $product = $this->model->getById($id);
        require __DIR__ . "/../views/admin/product/ProductEditView.php";
    }

    public function update(){
        $this->checkAdmin();
        $data = [
            "id" => $_POST["id"],
            "nombre" => $_POST["nombre"],
            "descripcion" => $_POST["descripcion"],
            "precio" => $_POST["precio"],
            "stock" => $_POST["stock"]
        ];
        $this->model->update($data);
        header("Location: index.php?controller=product&action=indexAdmin");
        exit;
    }

    // ADMIN - ELIMINAR
    public function delete(){
    
        if(!isset($_GET["id"])){
            die("ID no especificado");
        }
    
        $id = $_GET["id"];
    
        $this->model->delete($id);
    
        header("Location: index.php?controller=product&action=indexAdmin");
        exit;
    }

    // MÉTODO AUXILIAR IMÁGENES
    private function attachImages(&$productos) {
        require_once __DIR__ . "/../models/ProductImage.php";
        $imageModel = new ProductImage();
        foreach($productos as &$p){
            $imagenes = $imageModel->getAllByProductId($p['id']);
            $p['imagenes'] = $imagenes; // para carrusel
            $p['imagen'] = $imagenes[0]['url'] ?? null; // portada
        }
    }

    // SEGURIDAD ADMIN
    private function checkAdmin(){
        if(!isset($_SESSION['rol_id']) || $_SESSION['rol_id'] != 1){
            header("Location: index.php?controller=Auth&action=login");
            exit;
        }
    }
}