<?php
class Cart {

    private $conn;

    public function __construct($db){
        $this->conn = $db;
    }

    // 🔹 Obtener cart_id del usuario, si no existe, crear carrito
    private function getCartId($user_id){
        $stmt = $this->conn->prepare("SELECT id FROM carts WHERE user_id = ?");
        $stmt->execute([$user_id]);
        $cart = $stmt->fetch(PDO::FETCH_ASSOC);

        if(!$cart){
            $stmt = $this->conn->prepare("INSERT INTO carts(user_id) VALUES(?)");
            $stmt->execute([$user_id]);
            return $this->conn->lastInsertId();
        }

        return $cart['id'];
    }

    // 🔹 Obtener carrito completo
    public function getCart($user_id){
        $cart_id = $this->getCartId($user_id);

        $sql = "SELECT ci.*, p.nombre, p.precio, p.stock
                FROM cart_items ci
                JOIN products p ON ci.product_id = p.id
                WHERE ci.cart_id = ?";
        
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$cart_id]);
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // 🔹 Agregar producto al carrito
    public function addProduct($user_id, $product_id){
        $cart_id = $this->getCartId($user_id);

        // Verificar si ya existe en el carrito
        $check = "SELECT id, cantidad FROM cart_items 
                  WHERE cart_id = :cart_id AND product_id = :product_id";

        $stmt = $this->conn->prepare($check);
        $stmt->bindParam(":cart_id", $cart_id);
        $stmt->bindParam(":product_id", $product_id);
        $stmt->execute();

        if($stmt->rowCount() > 0){
            // Incrementar cantidad
            $query = "UPDATE cart_items 
                      SET cantidad = cantidad + 1 
                      WHERE cart_id = :cart_id AND product_id = :product_id";
        } else {
            // Insertar nuevo producto
            $query = "INSERT INTO cart_items(cart_id, product_id, cantidad)
                      VALUES(:cart_id, :product_id, 1)";
        }

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":cart_id", $cart_id);
        $stmt->bindParam(":product_id", $product_id);

        return $stmt->execute();
    }

    // 🔹 Eliminar producto del carrito
    public function remove($id){
        $query = "DELETE FROM cart_items WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        return $stmt->execute();
    }
}