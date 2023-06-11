<?php

class Categoria extends Controller{


    function __construct(){
        parent::__construct();
        $this->view->mensaje="";
        
    }

    function render(){
        $this->view->render('categoria/index');
    }

    function agregarCat(){
        $nombre    = $_POST['nombre'];
        $descripcion  = $_POST['descripcion'];

        if($this->model->insert(['nombre' => $nombre, 'descripcion' => $descripcion])){
           
            $this->view->mensaje = "Categoría creado correctamente";
            header('location: '.constant('URL').'consultacategoria');
            //$this->view->render('categoria/index');
        }else{
            $this->view->mensaje = "La categoría ya está registrada";
            header('location: '.constant('URL').'consultacategoria');
            $this->view->render('categoria/index');
        }
    }

}
