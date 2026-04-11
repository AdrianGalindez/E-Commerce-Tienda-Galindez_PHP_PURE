<?php

class Order {

    private $conn;
    private $table = "orders";

    public $id;
    public $user_id;
    public $total;

    public function __construct($db){
        $this->conn = $db;
    }

    // CREAR ORDEN
    public function create(){

        $query = "INSERT INTO orders(user_id,total)
                  VALUES(:user_id,:total)";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":user_id",$this->user_id);
        $stmt->bindParam(":total",$this->total);

        return $stmt->execute();
    }

    // OBTENER TODAS LAS ORDENES
    public function getAll(){

        $query = "SELECT * FROM " . $this->table;

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}