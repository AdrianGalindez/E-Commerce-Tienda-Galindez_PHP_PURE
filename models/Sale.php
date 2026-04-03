<?php

class Sale {

    private $conn;
    private $table = "sales";

    public function __construct(){
        // si luego quieres DB, la agregamos
    }

    public function getAll(){
        return [];
    }

    public function getById($id){
        return [];
    }

    public function create($data){
        return true;
    }

    public function update($data){
        return true;
    }

    public function delete($id){
        return true;
    }
}