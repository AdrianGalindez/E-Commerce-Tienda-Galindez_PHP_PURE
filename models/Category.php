<?php

class Category {

    private $conn;
    private $table = "categories";

    public $id;
    public $nombre;

    public function __construct($db){

        $this->conn = $db;
    }

    public function all(){

        $query = "SELECT * FROM ".$this->table;

        $stmt = $this->conn->prepare($query);

        $stmt->execute();

        return $stmt;
    }

    public function create(){

        $query = "INSERT INTO categories(nombre)
                  VALUES(:nombre)";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":nombre",$this->nombre);

        return $stmt->execute();
    }
    public function delete($id){

    $query = "DELETE FROM categories WHERE id = :id";

    $stmt = $this->conn->prepare($query);

    $stmt->bindParam(":id", $id);

    return $stmt->execute();
}
}