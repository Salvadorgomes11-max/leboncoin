<?php
require __DIR__ . '/../models/ModelAnuncio.php'; // estou na pasta controller vou buscar 

class ControllerAnuncio{
    private $modelo;

    public function __construct(){
        $model = new ModelAnuncio();
        $this->modelo = $model;
    }

    public function listarTodos(){
        $anucios = $this->modelo->listarAnuncio();
        if(empty($anucios)){
            echo 'A inda nao tem anuncios registrado no bango de dados' . '<br>';
            require __DIR__ . '/../views/home.php';
        }else{
            echo 'Aqui estão os anuncios registrados no banco de dados' . '<br>';
            require __DIR__ . '/../views/home.php';

        }    
    }

    public function cadastrarAnuncio(){ // nao esta funcionar 
    
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            

            if(!empty($_POST['nome']) &&
               !empty($_POST['descricao']) && 
               !empty($_POST['preco']) && 
               !empty($_POST['categoria']) && 
               !empty($_POST['image'])){

                $nome = $_POST['nome'];
                $descricao = $_POST['descricao'];
                $preco = $_POST['preco'];
                $categoria = $_POST['categoria'];
                $image = $_POST['image'];

                $modelo = new ModelAnuncio();
                $modelo->salvarAnuncio($nome, $descricao, $preco, $categoria, $image);

                echo 'Anuncio cadastrado com sucesso' . '<br>';
                header('location: /LEBONCOIN/');
            }

        }else{
            echo 'Prenche todos campos de cadastro';
            require __DIR__ . '/../views/cadastrarAnuncio.html';
        }    
    }

    public function formEditar($id){
        $anuncio = $this->modelo->buscarPorId($id);
        if($anuncio){
            require __DIR__ . '/../views/editarAnuncio.php';
        }else{
            echo 'Anuncio não encontrado';
        }
    }

    public function atualizar($id) {
    $dados = $_POST;
    $this->modelo->atualizarAnuncio($id, $dados);
    header('Location: /');
    }

    public function excluir($id) {

    $this->modelo->excluirAnuncio($id);
    header('Location: /');
    
    }
 


}