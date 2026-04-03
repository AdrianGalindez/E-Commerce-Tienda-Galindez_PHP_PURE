<?php
// controllers/AddressController.php

require_once "../models/Address.php";

class AddressController {

    private $model;

    public function __construct() {
        $this->model = new Address();
    }

    // Listar todas las direcciones
    public function index() {
        $addresses = $this->model->getAll();
        require "../views/AddressIndexView.php";
    }

    // Mostrar formulario para crear nueva dirección
    public function create() {
        require "../views/AddressCreateView.php";
    }

    // Guardar nueva dirección en la base de datos
    public function store() {
        $data = [
            "user_id"   => $_POST["user_id"],
            "direccion" => $_POST["direccion"],
            "ciudad"    => $_POST["ciudad"],
            "barrio"    => $_POST["barrio"],
            "referencia"=> $_POST["referencia"]
        ];

        $this->model->create($data);
        header("Location: index.php?controller=Address&action=index");
    }

    // Mostrar formulario para editar dirección existente
    public function edit() {
        $id = $_GET["id"];
        $address = $this->model->getById($id);
        require "../views/AddressEditView.php";
    }

    // Actualizar dirección en la base de datos
    public function update() {
        $data = [
            "id"        => $_POST["id"],
            "user_id"   => $_POST["user_id"],
            "direccion" => $_POST["direccion"],
            "ciudad"    => $_POST["ciudad"],
            "barrio"    => $_POST["barrio"],
            "referencia"=> $_POST["referencia"]
        ];

        $this->model->update($data);
        header("Location: index.php?controller=Address&action=index");
    }

    // Eliminar dirección
    public function delete() {
        $id = $_GET["id"];
        $this->model->delete($id);
        header("Location: index.php?controller=Address&action=index");
    }
}