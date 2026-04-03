<?php

class Cart {

    private $conn;
    private $table = "carts";

    public $id;
    public $user_id;

    public function __construct($db){

        $this->conn = $db;
    }

    public function create(){

        $query = "INSERT INTO carts(user_id)
                  VALUES(:user_id)";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":user_id",$this->user_id);

        return $stmt->execute();
    }
}