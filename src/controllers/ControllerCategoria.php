<?php

require __DIR__ . '/../models/ModelCategoria.php';

class ControllerCategoria {

    public function  __construct(){
        $this->model = new ModelCategoria(); // estanciar a classe model 
    }

    public function categoria($id){
        $anuncios = $this->model->categoria($id);

        if(empty($anuncios)){

        echo 'Nenhum anuncio encontrado';
        require __DIR__ . '/../views/home.php';
        

        }else{
            require __DIR__ . '/../views/home.php';

        }
   
    }
}