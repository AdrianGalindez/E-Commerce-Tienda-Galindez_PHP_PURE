<?php

class Cart {

    private $conn;

    public function __construct($db){
        $this->conn = $db;
    }

    // 🔹 Obtener carrito
    public function getCart($user_id){

        $query = "SELECT c.id, p.nombre, c.cantidad, p.precio
                  FROM cart_items c
                  JOIN products p ON c.product_id = p.id
                  WHERE c.user_id = :user_id";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":user_id", $user_id);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // 🔹 Agregar producto
    public function addProduct($user_id, $product_id){

        // Verificar si ya existe
        $check = "SELECT id, cantidad FROM cart_items 
                  WHERE user_id = :user_id AND product_id = :product_id";

        $stmt = $this->conn->prepare($check);
        $stmt->bindParam(":user_id", $user_id);
        $stmt->bindParam(":product_id", $product_id);
        $stmt->execute();

        if($stmt->rowCount() > 0){
            // Incrementar cantidad
            $query = "UPDATE cart_items 
                      SET cantidad = cantidad + 1 
                      WHERE user_id = :user_id AND product_id = :product_id";
        } else {
            // Insertar nuevo
            $query = "INSERT INTO cart_items(user_id, product_id, cantidad)
                      VALUES(:user_id, :product_id, 1)";
        }

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":user_id", $user_id);
        $stmt->bindParam(":product_id", $product_id);

        return $stmt->execute();
    }

    // 🔹 Eliminar producto
    public function remove($id){

        $query = "DELETE FROM cart_items WHERE id = :id";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);

        return $stmt->execute();
    }
}