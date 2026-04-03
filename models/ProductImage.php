<?php
require_once __DIR__ . "/../config/Database.php";

class ProductImage {

    private $conn;
    private $table = "product_images";

    public function __construct(){
        $database = new Database();
        $this->conn = $database->connect();
    }

    // 🔥 Obtener TODAS las imágenes
    public function getAll(){
        $sql = "SELECT * FROM " . $this->table;
        $stmt = $this->conn->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // 🔥 Obtener UNA imagen por ID
    public function getById($id){
        $sql = "SELECT * FROM " . $this->table . " WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // 🔥 Obtener UNA imagen por producto (para cards)
    public function getByProductId($product_id){
        $sql = "SELECT * FROM " . $this->table . " WHERE product_id = ? LIMIT 1";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$product_id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // 🔥 Obtener TODAS las imágenes de un producto (para carrusel)
    public function getAllByProductId($product_id){
        $sql = "SELECT * FROM " . $this->table . " WHERE product_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$product_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // 🔥 Crear imagen
    public function create($data){
        $sql = "INSERT INTO " . $this->table . " (product_id, url)
                VALUES (:product_id, :url)";

        $stmt = $this->conn->prepare($sql);

        $stmt->bindParam(":product_id", $data["product_id"]);
        $stmt->bindParam(":url", $data["url"]);

        return $stmt->execute();
    }

    // 🔥 Actualizar imagen
    public function update($data){
        $sql = "UPDATE " . $this->table . "
                SET product_id = :product_id, url = :url
                WHERE id = :id";

        $stmt = $this->conn->prepare($sql);

        $stmt->bindParam(":id", $data["id"]);
        $stmt->bindParam(":product_id", $data["product_id"]);
        $stmt->bindParam(":url", $data["url"]);

        return $stmt->execute();
    }

    // 🔥 Eliminar imagen
    public function delete($id){
        $sql = "DELETE FROM " . $this->table . " WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$id]);
    }
}