<?php
require __DIR__ . '/../config/DataBase.php'; // estou na pasta model vou buscar

class ModelAnuncio{
    private $conexao;

    public function __construct(){
        $Bdados = new DataBase();
        $this->conexao = $Bdados->conectar();
    }

    public function listarAnuncio(){
        $sql = "SELECT * FROM anuncios";
        $consulta = $this->conexao->prepare($sql);
        $consulta->execute();
        return $resultado = $consulta->fetchALL(PDO::FETCH_ASSOC); //recebe o resultado da consulta

    }

    public function inserirAnuncio($user_id, $titulo, $descricao, $preco, $categoria_id, $data_criacao, $imagem){
        $sql = "INSERT INTO anuncios (user_id, titulo, descricao, preco, categoria_id, data_criacao, imagem)
        VALUES (:user_id, :titulo, :descricao, :preco, :categoria_id, :data_criacao, :imagem)";
        $consulta = $this->conexao->prepare($sql);
        return $consulta->execute([
            ':user_id' => $user_id,
            ':titulo' => $titulo,
            ':descricao' => $descricao,
            ':preco' => $preco,
            ':categoria_id' => $categoria_id,
            ':data_criacao' => $data_criacao,
            ':imagem' => $imagem    
        ]); // Je l'ai fait de cette façon, mais je sais bien faire bindParam.

    }

    public function meusAnuncios($user_id) {

    $sql = "SELECT * FROM anuncios WHERE user_id = :user_id ORDER BY data_criacao DESC"; // todos anuncios de um usuario
    $consulta = $this->conexao->prepare($sql);
    $consulta->execute([':user_id' => $user_id]);
    return $consulta->fetchAll(PDO::FETCH_ASSOC);

    }


    public function Userdetalhes($id){
        $sql = "SELECT * FROM anuncios WHERE id = :id";
        $consulta = $this->conexao->prepare($sql);
        $consulta->bindParam(':id', $id, PDO::PARAM_INT);
        $consulta->execute();
        return $resultado = $consulta->fetch(PDO::FETCH_ASSOC); 

    }

    public function salvarAnuncio($nome, $descricao, $preco, $categoria, $image){

        $sql = "INSERT INTO anuncios (nome, descricao, preco, categoria, image)
        VALUES (:nome, :descricao, :preco, :categoria, :image)";
        $consulta = $this->conexao->prepare($sql);
        $consulta->bindParam(':nome', $nome);
        $consulta->bindParam(':descricao' , $descricao);
        $consulta->bindParam(':preco', $preco);
        $consulta->bindParam(':categoria' , $categoria);
        $consulta->bindParam(':image', $image);
        $consulta->execute();

        if($consulta->execute()){
            echo 'inserido com sucesso';
        }
        echo 'erro ao inserir';

        if(!$consulta->execute()){
            print_r($consulta->errorInfo());
        }

    }

    public function buscarPorId($id){

        $sql = "SELECT * FROM anuncios WHERE id = :id";
        $consulta = $this->conexao->prepare($sql);
        $consulta->bindParam(':id', $id);
        $consulta->execute();
        return $resultado = $consulta->fetch(PDO::FETCH_ASSOC);
    }

    public function eliminar($id){
        $sql = "DELETE FROM anuncios WHERE id = :id";
        $consulta = $this->conexao->prepare($sql);
        return $consulta->execute([':id' => $id]);
    }

}