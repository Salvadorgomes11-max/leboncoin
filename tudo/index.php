<?php
session_start(); // simplesmente inicia a sessão

require __DIR__. '/vendor/autoload.php';

$router = new AltoRouter(); // estanciar a classe 
$router->setBasePath('/LEBONCOIN'); // setBasePath difine o caminho base para o router

// rota listar
$router->map('GET', '/', 'ControllerAnuncio#listarTodos', 'home'); 
// rota cadastrar
$router->map('GET|POST', '/cadastrar', 'ControllerAnuncio#cadastrarAnuncio', 'cadastrar');
// rota update
$router->map('GET', '/anuncio/[i:id]/editar', 'ControllerAnuncio#Editar', 'form_editar');
// para actualisar
$router->map('POST', '/anuncio/[i:id]/atualizar', 'ControllerAnuncio#atualizar', 'atualizar_anuncio');
//excluir
$router->map('GET', '/anuncio/[i:id]/excluir', 'ControllerAnuncio#excluir', 'excluir_anuncio');


$match = $router->match();






if (is_array($match)) { // verifica se a rota existe
        list($controller, $action) = explode("#", $match['target']); // verifica controller e o metudo
        $obj = new $controller(); // e cria a classe controller

       if(is_callable(array($obj, $action))) {
        call_user_func_array(array($obj, $action), $match['params']);
       } // verifica se metudo pode ser chamado
    //    echo 'Pagina encontrada';

    //    var_dump($controller); // testar a classe controller
    //    var_dump($action); // testar o metudo

    } else {
        http_response_code(404);
        echo 'pagina nao encontrada';
    } 

