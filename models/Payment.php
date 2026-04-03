<?php

class Payment {

    private $conn;
    private $table = "payments";

    public $id;
    public $order_id;
    public $metodo;
    public $estado;

    public function __construct($db){

        $this->conn = $db;
    }

    public function create(){

        $query = "INSERT INTO payments(order_id,metodo,estado)
                  VALUES(:order_id,:metodo,:estado)";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":order_id",$this->order_id);
        $stmt->bindParam(":metodo",$this->metodo);
        $stmt->bindParam(":estado",$this->estado);

        return $stmt->execute();
    }
}