<?php

class DataBase {
    public function conectar(){
        try{
        $conexao = new PDO("mysql:host=localhost; dbname=leboncoin", "root", "");
        $conexao->exec("set names utf8");
        $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo 'conexao bem sucedida'; // depois devo remover 
        echo '<br>'; 
        return $conexao;
        }catch(PDOException $e){
        echo 'Erro ao conectar ao banco de dados: '. $e->getMessage();
        echo '<br>';
        return null;
        }
    }
}
// a inda nao foi testado