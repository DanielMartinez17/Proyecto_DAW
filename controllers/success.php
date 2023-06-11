<?php

class Success extends Controller{

    function __construct(){
        parent::__construct();
        
        //echo "Error al cargar el recurso";
    }

    function nuevoAlumno(){
        $this->view->mensaje = "Creado correctamente";
        $this->view->render('success/index');
    }
}
?>