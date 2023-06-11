<?php

class Producto extends Controller{


    function __construct(){
        parent::__construct();
        $this->view->mensaje="";
        
    }

    function render(){
        $this->view->render('success/index');
    }

    function agregarProd(){
        move_uploaded_file($_FILES['imagen']['tmp_name'],"D:/xampp/htdocs/Proyecto_DAW/public/img_products/".$_FILES['imagen']['name']);
        $nombre  = $_POST['nombre'];
        $precio  = $_POST['precio'];
        $stok  = $_POST['stok'];
        $imagen  = $_FILES['imagen']['name'];
        $id_categoria = $_POST['id_categoria'];

        if($this->model->insert(['nombre' => $nombre, 'precio' => $precio, 'stok' => $stok, 'imagen' => $imagen, 'id_categoria' => $id_categoria, 'estado' => 1])){
            $this->view->mensaje = "Categoría creado correctamente";
            header('location: '.constant('URL').'consultaproducto');
            //$this->view->render('success/index');
        }else{
            
            $this->view->mensaje = "La categoría ya está registrada";
            header('location: '.constant('URL').'consultaproducto');
            //$this->view->render('success/index');
        }
    }

}