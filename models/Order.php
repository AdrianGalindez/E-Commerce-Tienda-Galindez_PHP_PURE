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

    public function create(){

        $query = "INSERT INTO orders(user_id,total)
                  VALUES(:user_id,:total)";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":user_id",$this->user_id);
        $stmt->bindParam(":total",$this->total);

        return $stmt->execute();
    }
}