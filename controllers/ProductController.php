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


    // CLIENTE - DETALLE
    public function show(){
        $id = $_GET["id"];
        $product = $this->model->getById($id);
        require_once __DIR__ . "/../models/ProductImage.php";
        $imageModel = new ProductImage();
        $imagenes = $imageModel->getAllByProductId($id);
        $product['fotos'] = array_column($imagenes, 'url');
        require __DIR__ . "/../views/client/ClientDetailProduct.php";
    }

    // ADMIN - LISTADO (CRUD)
    public function index(){
        $this->checkAdmin();
        $productos = $this->model->all();
        $categorias = $this->model->getCategorias();
        require __DIR__ . "/../views/client/ClientIndex.php";
    }

    public function indexAdmin(){
        $this->checkAdmin();
        $productos = $this->model->all();
        $this->attachImages($productos);
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

        // ✅ VALIDACIÓN PRIMERO
        if(empty($_POST["nombre"]) || empty($_POST["precio"])){
            die("Datos obligatorios faltantes");
        }

        $this->model->nombre = $_POST["nombre"];
        $this->model->descripcion = $_POST["descripcion"];
        $this->model->precio = $_POST["precio"];
        $this->model->stock = $_POST["stock"];
        $this->model->categoria_id = $_POST["categoria_id"];
        $this->model->marca_id = $_POST["marca_id"];
        $this->model->proveedor_id = $_POST["proveedor_id"] ?? null;

        if($this->model->create()){

            $product_id = $this->model->getLastInsertId();

            require_once __DIR__ . "/../models/ProductImage.php";
            $imageModel = new ProductImage();

            $uploadDir = __DIR__ . "/../assets/img/products/";

            if(!is_dir($uploadDir)){
                mkdir($uploadDir, 0777, true);
            }

            $total = min(count($_FILES['imagenes']['name']), 5);

            for($i = 0; $i < $total; $i++){

                if($_FILES['imagenes']['error'][$i] === 0){

                    $tmpName = $_FILES['imagenes']['tmp_name'][$i];

                    $ext = pathinfo($_FILES['imagenes']['name'][$i], PATHINFO_EXTENSION);
                    $name = uniqid() . "." . $ext;

                    $path = $uploadDir . $name;

                    if(move_uploaded_file($tmpName, $path)){

                        $url = "assets/img/products/" . $name;
                        $imageModel->save($product_id, $url);

                    } else {
                        echo "Error subiendo imagen";
                    }
                }
            }

            header("Location: index.php?controller=product&action=indexAdmin");
            exit;
        }
    }

    // ADMIN - EDITAR
public function edit(){
    $this->checkAdmin();
    $id = $_GET["id"];

    $product = $this->model->getById($id);

    // 🔥 AGREGAR ESTO
    require_once __DIR__ . "/../models/ProductImage.php";
    $imageModel = new ProductImage();

    $imagenes = $imageModel->getAllByProductId($id);

    // convertir a array simple de URLs
    $product['fotos'] = array_column($imagenes, 'url');

    require __DIR__ . "/../views/admin/product/ProductEditView.php";
}

public function update(){
    $this->checkAdmin();

    $id = $_POST["id"];

    // 🔹 actualizar datos básicos
    $data = [
        "id" => $id,
        "nombre" => $_POST["nombre"],
        "descripcion" => $_POST["descripcion"],
        "precio" => $_POST["precio"],
        "stock" => $_POST["stock"]
    ];

    $this->model->update($data);

    require_once __DIR__ . "/../models/ProductImage.php";
    $imageModel = new ProductImage();

    $uploadDir = __DIR__ . "/../assets/img/products/";

    // 🔥 1. ELIMINAR IMÁGENES
    if(!empty($_POST['delete_images'])){
        foreach($_POST['delete_images'] as $imgUrl){

            $filePath = __DIR__ . "/../" . $imgUrl;

            // borrar archivo físico
            if(file_exists($filePath)){
                unlink($filePath);
            }

            // borrar de BD
            $imageModel->deleteByUrl($imgUrl);
        }
    }

    // 🔥 2. SUBIR NUEVAS IMÁGENES
    if(!empty($_FILES['imagenes']['name'][0])){

        $total = count($_FILES['imagenes']['name']);

        if($total > 5){
            $total = 5;
        }

        for($i = 0; $i < $total; $i++){

            if($_FILES['imagenes']['error'][$i] == 0){

                $tmpName = $_FILES['imagenes']['tmp_name'][$i];
                $name = time() . "_" . $_FILES['imagenes']['name'][$i];

                $path = $uploadDir . $name;

                if(move_uploaded_file($tmpName, $path)){
                    $url = "assets/img/products/" . $name;
                    $imageModel->save($id, $url);
                }
            }
        }
    }

    header("Location: index.php?controller=product&action=indexAdmin");
    exit;
}

    // ADMIN - ELIMINAR
    public function delete(){

        if(!isset($_POST["id"])){
            die("ID no especificado");
        }

        $id = $_POST["id"];

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