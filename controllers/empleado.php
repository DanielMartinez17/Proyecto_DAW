<?php
include 'libs/encript_desencipt.php';

class Empleado extends Controller{


    function __construct(){
        parent::__construct();
        $this->view->mensaje="";
        
    }

    function render(){
        $this->view->render('empleado/index');
    }

    function agregarEmp(){
        $encriptar = new cls_encriptar_desencriptar();

        $nombres    = $_POST['nombres'];
        $apellidos  = $_POST['apellidos'];
        $area_trabajo    = $_POST['area_trabajo'];
        $usuario  = $_POST['usuario'];
        $contrasena =  $encriptar->encrypt($_POST['contrasena']);

        if($this->model->insert(['nombres' => $nombres, 'apellidos' => $apellidos, 'area_trabajo' => $area_trabajo, 'usuario' => $usuario, 'contrasena' => $contrasena])){
            
            $this->view->mensaje = "Categoría creado correctamente";
            header('location: '.constant('URL').'consultaempleado');
            //$this->view->render('empleado/index');
        }else{
            $this->view->mensaje = "La categoría ya está registrada";
            header('location: '.constant('URL').'consultaempleado');
            //$this->view->render('empleado/index');
        }
    }

}
