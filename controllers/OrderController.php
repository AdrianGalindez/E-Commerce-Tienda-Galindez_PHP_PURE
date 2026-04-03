<?php

require_once "../models/Order.php";

class OrderController{

    private $model;

    public function __construct(){

        $this->model = new Order();

    }

    public function index(){

        $orders = $this->model->getOrders($_SESSION["user_id"]);

        require "../views/orderShowView.php";

    }

    public function checkout(){

        $this->model->createOrder($_SESSION["user_id"]);

        header("Location: index.php?controller=order&action=index");

    }

}