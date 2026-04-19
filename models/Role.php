<?php

class Role {

    private $conn;
    private $table = "roles";

    public $id;
    public $nombre;

    public function __construct($db){
        $this->conn = $db;
    }

    // LISTAR
    public function all(){
        $query = "SELECT * FROM roles";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    // CREAR
    public function create(){
        $query = "INSERT INTO roles (nombre) VALUES (:nombre)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":nombre", $this->nombre);
        return $stmt->execute();
    }

    // BUSCAR POR ID
    public function find($id){
        $query = "SELECT * FROM roles WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // ACTUALIZAR
    public function update(){
        $query = "UPDATE roles SET nombre = :nombre WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":nombre", $this->nombre);
        $stmt->bindParam(":id", $this->id);
        return $stmt->execute();
    }

    // ELIMINAR
    public function delete($id){
        $query = "DELETE FROM roles WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        return $stmt->execute();
    }
}