<?php
// controllers/SaleDetailController.php

require_once "../models/Order.php";
require_once "../models/Product.php";

class SaleDetailController {

    private $orderModel;
    private $productModel;

    public function __construct() {
        $this->orderModel = new Order();
        $this->productModel = new Product();
    }

    // Listar todos los detalles de todas las ventas
    public function index() {
        $orderItems = $this->orderModel->getAllItems(); 
        // Aquí podrías mostrar un listado general de productos/ventas
        require "../views/ClientDetailProduct.php"; 
    }

    // Mostrar los detalles de una venta específica
    public function show() {
        $order_id = $_GET["order_id"] ?? null;

        if (!$order_id) {
            header("Location: index.php?controller=SaleDetail&action=index");
            exit;
        }

        // Traer los productos de esa orden
        $items = $this->orderModel->getItemsByOrder($order_id);

        // Mapear productos completos para la vista
        $products = [];
        foreach ($items as $item) {
            $product = $this->productModel->getById($item['product_id']);
            if ($product) {
                $product['cantidad'] = $item['cantidad'];
                $product['precio_total'] = $item['precio'] * $item['cantidad'];
                $products[] = $product;
            }
        }

        // La vista ClientDetailProduct espera $product (o en este caso varios)
        // Para mostrar uno solo, podemos pasar el primero
        $product = $products[0] ?? null; 
        $reviews = $product ? $this->productModel->getReviews($product['id']) : [];

        require "../views/ClientDetailProduct.php"; 
    }

    // Crear, store, edit, update, delete se mantienen igual
    // (con validación de $_POST y $_GET como ya lo tenías)
}