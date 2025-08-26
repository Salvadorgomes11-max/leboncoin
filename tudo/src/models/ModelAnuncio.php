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
        return $resultado = $consulta->fetch(PDO::FETCH_ASSOC);
    }

    public function atualizarAnuncio($id, $dados) {
    $sql = "UPDATE anuncios SET name = :name, descricao = :descricao, preco = :preco, categoria = :categoria WHERE id = :id";
    $consulta = $this->conexao->prepare($sql);
    $consulta->execute([
        ':name' => $dados['name'],
        ':descricao' => $dados['descricao'],
        ':preco' => $dados['preco'],
        ':categoria' => $dados['categoria'],
        ':id' => $id
      ]);
    }

    public function excluirAnuncio($id) {

    $sql = "DELETE FROM anuncios WHERE id = :id";
    $stmt = $this->conexao->prepare($sql);
    $stmt->execute([':id' => $id]);
    
    }


}