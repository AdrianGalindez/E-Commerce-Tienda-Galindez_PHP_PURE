<?php

class OrderItem {

    private $conn;
    private $table = "order_items";

    public $id;
    public $order_id;
    public $product_id;
    public $cantidad;
    public $precio;

    public function __construct($db){

        $this->conn = $db;
    }

    public function create(){

        $query = "INSERT INTO order_items(
        order_id,product_id,cantidad,precio
        )
        VALUES(
        :order_id,:product_id,:cantidad,:precio
        )";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":order_id",$this->order_id);
        $stmt->bindParam(":product_id",$this->product_id);
        $stmt->bindParam(":cantidad",$this->cantidad);
        $stmt->bindParam(":precio",$this->precio);

        return $stmt->execute();
    }
}
