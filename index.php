<?php
session_start(); // simplesmente inicia a sessão

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);



require __DIR__. '/vendor/autoload.php';

$router = new AltoRouter(); // estanciar a classe 
$router->setBasePath('/LEBONCOIN'); // setBasePath difine o caminho base para o router



// home
$router->map('GET', '/', 'ControllerAnuncio#listarTodos', 'home');
//adicionar
$router->map('GET|POST', '/adicionar', 'ControllerAnuncio#adicionar', 'adicionar');
//POST ID
$router->map('GET', '/detalhes/[i:id]', 'ControllerAnuncio#detalhes', 'detalhes');
//meu anuncio 
$router->map('GET', '/meus-anuncios', 'ControllerAnuncio#meusAnuncios', 'meus_anuncios');
//editar
//Eliminar
$router->map('GET', '/eliminar/[i:id]', 'ControllerAnuncio#eliminar', 'eliminar');

// ______________________________________________________Category
$router->map('GET', '/categoria/[i:id]', 'ControllerCategoria#categoria', 'categoria');

// ______________________________________________________User

// login resgister
$router->map('GET|POST', '/register', 'ControllerUser#register','register');
$router->map('GET|POST', '/login', 'ControllerUser#login','login');
$router->map('GET|POST', '/Desconect', 'ControllerUser#login','Desconect');


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

