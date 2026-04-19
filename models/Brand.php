<?php

class Brand {

    private $conn;
    private $table = "brands";
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
        $query = "INSERT INTO brands(nombre)
                  VALUES(:nombre)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":nombre",$this->nombre);
        return $stmt->execute();
    }

    public function find($id){

    $query = "SELECT * FROM brands WHERE id = :id";
    $stmt = $this->conn->prepare($query);

    $stmt->bindParam(":id", $id);

    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_ASSOC);
    }


    public function update(){

    $query = "UPDATE brands SET nombre = :nombre WHERE id = :id";

    $stmt = $this->conn->prepare($query);

    $stmt->bindParam(":nombre", $this->nombre);
    $stmt->bindParam(":id", $this->id);

    return $stmt->execute();
    }

    public function delete($id){

    $query = "DELETE FROM brands WHERE id = :id";

    $stmt = $this->conn->prepare($query);

    $stmt->bindParam(":id", $id);

    return $stmt->execute();
    }
}