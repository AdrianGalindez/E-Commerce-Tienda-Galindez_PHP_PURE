<?php

class Database {

    private $host = "localhost";
    private $db = "tienda_galindez";
    private $user = "root";
    private $pass = "";
    private $port = "3306";
    public $conn;

    public function connect(){
        try{
            $dsn = "mysql:host={$this->host};port={$this->port};dbname={$this->db};charset=utf8mb4";
            $this->conn = new PDO(
                $dsn,
                $this->user,
                $this->pass
            );
            $this->conn->setAttribute(
                PDO::ATTR_ERRMODE,
                PDO::ERRMODE_EXCEPTION
            );
        }
        catch(PDOException $e){
            die("Error de conexión: " . $e->getMessage());
        }
        return $this->conn;
    }
}