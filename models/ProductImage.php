<?php

require_once __DIR__ . "/../config/Database.php";

class ProductImage {

    private $conn;
    private $table = "product_images";

    public function __construct(){
        $database = new Database();
        $this->conn = $database->connect();
    }

    public function save($product_id, $url){
        $sql = "INSERT INTO product_images (product_id, url) VALUES (?, ?)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$product_id, $url]);
    }

    public function getAllByProductId($id){
        $sql = "SELECT * FROM product_images WHERE product_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}