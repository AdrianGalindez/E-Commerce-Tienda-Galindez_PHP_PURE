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

        $query = "SELECT * FROM products";

        $stmt = $this->conn->prepare($query);

        $stmt->execute();

        return $stmt;
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
}