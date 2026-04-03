<?php

class Product {

    private $conn;
    private $table = "products";

    public $id;
    public $nombre;
    public $descripcion;
    public $precio;
    public $stock;

    public $categoria_id;
    public $marca_id;
    public $proveedor_id;

    public function __construct($db){

        $this->conn = $db;
    }

    public function all(){
        $sql = "SELECT 
                    p.*, 
                    c.nombre AS categoria, 
                    b.nombre AS marca
                FROM products p
                LEFT JOIN categories c ON p.categoria_id = c.id
                LEFT JOIN brands b ON p.marca_id = b.id";
    
        $stmt = $this->conn->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create(){

        $query = "INSERT INTO products(
        nombre,descripcion,precio,stock,categoria_id,marca_id,proveedor_id
        )
        VALUES(
        :nombre,:descripcion,:precio,:stock,:categoria_id,:marca_id,:proveedor_id
        )";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":nombre",$this->nombre);
        $stmt->bindParam(":descripcion",$this->descripcion);
        $stmt->bindParam(":precio",$this->precio);
        $stmt->bindParam(":stock",$this->stock);
        $stmt->bindParam(":categoria_id",$this->categoria_id);
        $stmt->bindParam(":marca_id",$this->marca_id);
        $stmt->bindParam(":proveedor_id",$this->proveedor_id);

        return $stmt->execute();
    }


    public function getCategorias(){
       $sql = "SELECT * FROM categories";
       $stmt = $this->conn->query($sql);
       return $stmt->fetchAll(PDO::FETCH_ASSOC);
   }
    public function getByCategorias($id){
        $sql = "SELECT 
                    p.*, 
                    c.nombre AS categoria, 
                    b.nombre AS marca
                FROM products p
                LEFT JOIN categories c ON p.categoria_id = c.id
                LEFT JOIN brands b ON p.marca_id = b.id
                WHERE p.categoria_id = ?";
    
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id]);
    
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } 

    public function getById($id){
        $sql = "SELECT 
                    p.*, 
                    c.nombre AS categoria, 
                    b.nombre AS marca
                FROM products p
                LEFT JOIN categories c ON p.categoria_id = c.id
                LEFT JOIN brands b ON p.marca_id = b.id
                WHERE p.id = ?";
    
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id]);
    
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}