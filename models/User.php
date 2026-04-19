<?php

class User {

    private $conn;
    private $table = "users";

    public $id;
    public $nombre;
    public $email;
    public $telefono;
    public $password;
    public $rol_id;

    public function __construct($db){

        $this->conn = $db;
    }

    public function all(){

        $query = "SELECT * FROM ".$this->table;

        $stmt = $this->conn->prepare($query);

        $stmt->execute();

        return $stmt;
    }

    public function find($id){

        $query = "SELECT * FROM ".$this->table." WHERE id = :id";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":id",$id);

        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create(){

        $query = "INSERT INTO users(nombre,email,telefono,password,rol_id)
                  VALUES(:nombre,:email,:telefono,:password,:rol_id)";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":nombre",$this->nombre);
        $stmt->bindParam(":email",$this->email);
        $stmt->bindParam(":telefono",$this->telefono);
        $stmt->bindParam(":password",$this->password);
        $stmt->bindParam(":rol_id",$this->rol_id);

        return $stmt->execute();
    }

    public function delete($id){

        $query = "DELETE FROM users WHERE id = :id";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":id",$id);

        return $stmt->execute();
    }

    public function update(){

    $query = "UPDATE users 
              SET nombre = :nombre,
                  email = :email,
                  telefono = :telefono
              WHERE id = :id";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(":nombre", $this->nombre);
    $stmt->bindParam(":email", $this->email);
    $stmt->bindParam(":telefono", $this->telefono);
    $stmt->bindParam(":id", $this->id);
    return $stmt->execute();
    }
}