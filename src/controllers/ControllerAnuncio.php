<?php
require __DIR__ . '/../models/ModelAnuncio.php'; // estou na pasta controller vou buscar 

class ControllerAnuncio{
    private $model;

    public function __construct(){
        $this->model = new ModelAnuncio();
        
    }

    public function listarTodos(){
        $anuncios = $this->model->listarAnuncio();
        if(empty($anuncios)){
            echo 'A inda nao tem anuncios registrado no banco de dados' . '<br>';
            require __DIR__ . '/../views/home.php';
        }else{
            require __DIR__ . '/../views/home.php';

        }    
    }

    public function adicionar(){

        if($_SERVER['REQUEST_METHOD'] === 'POST'){

        $titulo = trim($_POST['titulo']);
        $descricao = trim($_POST['descricao']);
        $preco = trim($_POST['preco']);
        $categoria_id = $_POST['categoria_id'];
        $imagem = $_POST['imagem'];
        $data_criacao = date('Y-m-d H:i:s');
    
        $user_id = $_SESSION['user_id'];

        if(empty($user_id) || (empty($titulo)) || empty($descricao) || empty($preco) ||empty($categoria_id) ||empty($imagem)) {
            echo 'Preencha todos os campos' . '<br>';
            require __DIR__ . '/../views/adicionar.php';
            exit;
        }

        $sucesso = $this->model->inserirAnuncio($user_id, $titulo, $descricao, $preco, $categoria_id, $data_criacao, $imagem);

        if($sucesso){
            echo 'Anuncio adicionado com sucesso' . '<br>';
            header('Location: /LEBONCOIN/');
            exit;
        }else{
            echo 'Erro em inserir anuncio' . '<br>';
            require __DIR__ . '/../views/adicionar.php';
            exit;
        }
    }else{
        require __DIR__ . '/../views/adicionar.php';
    }
    

    }

    public function detalhes($id){
        
        $anuncio = $this->model->Userdetalhes($id);

        if( $anuncio == null){
            echo 'O anuncio não existe' . '<br>';
            require __DIR__ . '/../views/home.php';
            exit;
        }
        require __DIR__ . '/../views/detalhes.php';
    }

    public function meusAnuncios(){

        if (!isset($_SESSION['user_id'])){
            header('Location: /LEBONCOIN/login');
            exit;
        }
        $user_id = $_SESSION['user_id'];
        $anuncios = $this->model->meusAnuncios($user_id);

        require __DIR__ . '/../views/meusanuncio.php';
    }

    public function eliminar($id){
        
        $user_id = $_SESSION['user_id'];
        $anuncio = $this->model->buscarPorId($id);

        if(!$anuncio){
            echo 'O anuncio não existe' . '<br>';
            exit;
        }

        if($anuncio['user_id'] != $user_id){
            echo 'Você não tem permissão para eliminar esse anuncio' . '<br>';
            exit;

        }

        $this->model->eliminar($id);

        header('Location: /LEBONCOIN/meus-anuncios');
        exit;
    }

}