<?php

class Provider {

    private $conn;
    private $table = "providers";

    public $id;
    public $nombre;
    public $telefono;
    public $direccion;

    public function __construct($db){
        $this->conn = $db;
    }

    public function all(){

        $query = "SELECT * FROM " . $this->table;

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create(){

        $query = "INSERT INTO providers(nombre,telefono,direccion)
                  VALUES(:nombre,:telefono,:direccion)";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":nombre",$this->nombre);
        $stmt->bindParam(":telefono",$this->telefono);
        $stmt->bindParam(":direccion",$this->direccion);

        return $stmt->execute();
    }

    public function find($id){

    $query = "SELECT * FROM providers WHERE id = :id";

    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(":id", $id);

    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update(){

    $query = "UPDATE providers 
              SET nombre = :nombre,
                  telefono = :telefono,
                  direccion = :direccion
              WHERE id = :id";

    $stmt = $this->conn->prepare($query);

    $stmt->bindParam(":nombre", $this->nombre);
    $stmt->bindParam(":telefono", $this->telefono);
    $stmt->bindParam(":direccion", $this->direccion);
    $stmt->bindParam(":id", $this->id);

    return $stmt->execute();
    }

    public function delete($id){

    $query = "DELETE FROM providers WHERE id = :id";

    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(":id", $id);

    return $stmt->execute();
    }
}