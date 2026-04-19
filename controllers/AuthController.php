<?php
require_once __DIR__ . "/../config/Database.php";
require_once __DIR__ . "/../models/User.php";

class AuthController {

    private $model;

    public function __construct(){
    
        // session_start();
        $database = new Database();
        $db = $database->connect();
        $this->model = new User($db);
    
    }

    public function login() {
        require __DIR__ . "/../views/client/LoginView.php";
    }

    public function loginPost() {
        $email = $_POST["email"];
        $password = $_POST["password"];
        $user = $this->model->getByEmail($email);

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['nombre']  = $user['nombre'];
            $_SESSION['rol_id']  = $user['rol_id'];
            if($user['rol_id'] == 1){ // ADMIN
            header("Location: index.php?controller=product&action=index");
            } else { // CLIENTE
            
                header("Location: index.php?controller=product&action=index");
            }
            exit;
        } else {
            $error = "Email o contraseña incorrectos";
            require __DIR__ . "/../views/client/LoginView.php";
        }
    }

    public function register() {
        require __DIR__ . "/../views/client/RegisterView.php";
    }

    public function registerPost(){
        $this->model->nombre   = $_POST["nombre"];
        $this->model->email    = $_POST["email"];
        $this->model->telefono = $_POST["telefono"];
        $this->model->password = password_hash($_POST["password"], PASSWORD_DEFAULT);
        $this->model->rol_id   = 2;
        if($this->model->create()){
            header("Location: index.php?controller=Auth&action=login");
            exit;
        }else{
            echo "Error al registrar usuario";
        }
    }

    public function logout() {
        session_destroy();
        header("Location: index.php?controller=Auth&action=login");
    }
}