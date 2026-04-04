<?php
require_once __DIR__ . "/../config/Database.php";
require_once __DIR__ . "/../models/Product.php";

class ProductController{

    private $model;

    public function __construct(){

        $database = new Database();
        $db = $database->connect();

        $this->model = new Product($db);
    }


    
    public function index(){
    
        // Productos con categoría y marca
        $productos = $this->model->all();
    
        // Categorías
        $categorias = $this->model->getCategorias();
    
        // 🔥 AGREGAR IMÁGENES A CADA PRODUCTO usando el método auxiliar
        $this->attachImages($productos);
    
        require __DIR__ . "/../views/ClientIndex.php";
    }

    public function create(){

        require __DIR__ . "/../views/ProductCreateView.php";

    }

    public function store(){

        $data = [

            "nombre" => $_POST["nombre"],
            "descripcion" => $_POST["descripcion"],
            "precio" => $_POST["precio"],
            "stock" => $_POST["stock"],
            "categoria_id" => $_POST["categoria_id"],
            "marca_id" => $_POST["marca_id"]

        ];

        $this->model->create($data);

        header("Location: index.php?controller=product&action=index");

    }

    public function edit(){

        $id = $_GET["id"];

        $product = $this->model->getById($id);

        require __DIR__ . "/../views/productsEditView.php";

    }

    public function update(){

        $data = [

            "id" => $_POST["id"],
            "nombre" => $_POST["nombre"],
            "descripcion" => $_POST["descripcion"],
            "precio" => $_POST["precio"],
            "stock" => $_POST["stock"]

        ];

        $this->model->update($data);

        header("Location: index.php?controller=product&action=index");

    }

    public function delete(){

        $id = $_GET["id"];

        $this->model->delete($id);

        header("Location: index.php?controller=product&action=index");

    }

    public function show(){

        $id = $_GET["id"];
        // 🔥 Producto
        $product = $this->model->getById($id);
        // 🔥 Cargar modelo de imágenes
        require_once __DIR__ . "/../models/ProductImage.php";
        $imageModel = new ProductImage();
        // 🔥 Obtener TODAS las imágenes del producto
        $imagenes = $imageModel->getAllByProductId($id);
        // 🔥 Convertir a array simple
        $product['fotos'] = array_column($imagenes, 'url');
        require __DIR__ . "/../views/ClientDetailProduct.php";
    }

    // 🔥 MÉTODO AUXILIAR: AGREGAR IMÁGENES A LOS PRODUCTOS
    private function attachImages(&$productos) {
        require_once __DIR__ . "/../models/ProductImage.php";
        $imageModel = new ProductImage();

        foreach($productos as &$p){
            // Obtener todas las imágenes del producto
            $imagenes = $imageModel->getAllByProductId($p['id']);
            $p['imagenes'] = $imagenes; // Todas las imágenes para carrusel
            $p['imagen'] = $imagenes[0]['url'] ?? null; // Primera imagen para cards
        }
    }

}