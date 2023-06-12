<?php

class Errores extends Controller{

    function __construct(){
        parent::__construct();
        //$this->view->mensaje = "Hay un error al cargar el recurso";
        $this->view->render('Error_404/index');
        //echo "Error al cargar el recurso";
    }
}
?>