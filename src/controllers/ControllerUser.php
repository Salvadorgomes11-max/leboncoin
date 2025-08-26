<?php

require_once __DIR__ . '/../models/ModelUser.php';


class ControllerUser {
    private $modelUser;

    public function __construct(){
        $this->modelUser = new ModelUser();
        
    }

    public function register() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $name = trim($_POST['name']);
        $email = filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL); 
        $senha = trim($_POST['senha']);

        if (empty($name) || empty($email) || empty($senha)) {
            echo "Preencha todos os campos.";
            require_once __DIR__ . '/../views/register.php';
            exit;
        }
        
        $senhaHash = password_hash($senha, PASSWORD_DEFAULT);
        $sucesso = $this->modelUser->register($name, $email, $senhaHash);

        if ($sucesso) {
            echo "Usuário cadastrado com sucesso!";
            header('Location: /LEBONCOIN/');
            exit;
        } else {
            echo "Erro ao cadastrar usuário!";
            require_once __DIR__ . '/../views/register.php';
            exit;
        }

        } else {
        require_once __DIR__ . '/../views/register.php';
        }
    }   
    
    public function login() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $email = $_POST['email'] ?? null;
        $senha = $_POST['senha'] ?? null;

        if (empty($email) || empty($senha)) {
            echo "Por favor, preencha todos os campos.";
            require_once __DIR__ . '/../views/login.php';
            exit;
        }

        
        $user = $this->modelUser->login($email); 

        if ($user && password_verify($senha, $user['senha'])) {
            $_SESSION['user_id'] = $user['id'];
            header('Location: /LEBONCOIN/');
            exit;
        } else {
            echo "Email ou senha incorretos.";
            require_once __DIR__ . '/../views/login.php';
            exit;
        }

        } else {
        
        require_once __DIR__ . '/../views/login.php';
      }
    }    
}
