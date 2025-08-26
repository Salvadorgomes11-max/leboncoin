<?php

require __DIR__ . '/../config/DataBase.php';

class ModelUser{
    private $conexao;

    public function __construct(){
        $Bdados = new DataBase();
        $this->conexao = $Bdados->conectar();
    }

    public function register($nome, $email, $senha){
        $sql = "INSERT INTO users (nome, email, senha) VALUES (:nome, :email, :senha)";
        $consulta = $this->conexao->prepare($sql);
        return $consulta->execute([
            ':nome' => $nome,
            ':email' => $email,
            ':senha' => $senha
        ]);    
    }

    public function login($email){
        $sql = "SELECT * FROM users WHERE email = :email";
        $consulta = $this->conexao->prepare($sql);
        $consulta->execute([':email'=> $email]);
        return $consulta->fetch(PDO::FETCH_ASSOC);

    }
    
    
}