<?php

require __DIR__ . '/../config/DataBase.php';

class ModelCategoria {

    public function __construct() {
        $Bdados = new DataBase();
        $this->conexao = $Bdados->conectar();
    }

    public function categoria($categoria_id){
        $sql = "SELECT * FROM anuncios WHERE categoria_id = :categoria_id";
        $conexao = $this->conexao->prepare($sql);
        $conexao ->execute ([':categoria_id' => $categoria_id]);
        return $conexao->fetchALL(PDO ::FETCH_ASSOC);
    }
}