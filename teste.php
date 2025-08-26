<?php
require __DIR__ . '/../models/ModelAnuncio.php';

class ControllerAnuncio {
    private $modelo;

    public function __construct() {
        $this->modelo = new ModelAnuncio();
    }

    public function listarTodos() {
        $anuncios = $this->modelo->listarAnuncio();
        if (empty($anuncios)) {
            echo 'Ainda não tem anúncios registrados no banco de dados.<br>';
        } else {
            echo 'Aqui estão os anúncios registrados no banco de dados.<br>';
        }

        require __DIR__ . '/../views/home.php';
    }

    public function cadastrarAnuncio() {
        session_start(); // Garante acesso à sessão

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!empty($_POST['nome']) &&
                !empty($_POST['descricao']) &&
                !empty($_POST['preco']) &&
                !empty($_POST['categoria']) &&
                isset($_FILES['image']) && $_FILES['image']['error'] === 0) {

                // Verificar se o usuário está logado
                if (!isset($_SESSION['user_id'])) {
                    echo '⚠️ Usuário não está logado.';
                    return;
                }

                $user_id = $_SESSION['user_id'];
                $nome = $_POST['nome'];
                $descricao = $_POST['descricao'];
                $preco = $_POST['preco'];
                $categoria = $_POST['categoria'];

                // Salvar imagem
                $pastaDestino = __DIR__ . '/../public/imagens/';
                $nomeImagem = uniqid() . '_' . basename($_FILES['image']['name']);
                $caminhoCompleto = $pastaDestino . $nomeImagem;

                if (!is_dir($pastaDestino)) {
                    mkdir($pastaDestino, 0777, true);
                }

                if (move_uploaded_file($_FILES['image']['tmp_name'], $caminhoCompleto)) {
                    $caminhoImagem = 'imagens/' . $nomeImagem;

                    // Salvar no banco com user_id
                    $this->modelo->salvarAnuncio($nome, $descricao, $preco, $categoria, $caminhoImagem, $user_id);

                    echo '✅ Anúncio cadastrado com sucesso.<br>';
                    header('Location: /LEBONCOIN/');
                    exit;
                } else {
                    echo '❌ Erro ao salvar a imagem.';
                }
            } else {
                echo '⚠️ Preencha todos os campos e envie uma imagem.';
            }
        }

        // Exibe o formulário
        require __DIR__ . '/../views/cadastrarAnuncio.html';
    }
}

