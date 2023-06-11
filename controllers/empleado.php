<?php


class Empleado extends Controller{


    function __construct(){
        parent::__construct();
        $this->view->mensaje="";
        
    }

    function render(){
        $this->view->render('empleado/index');
    }

    function agregarEmp(){
        include 'libs/encript_desencipt.php';

        $nombres    = $_POST['nombres'];
        $apellidos  = $_POST['apellidos'];
        $area_trabajo    = $_POST['area_trabajo'];
        $usuario  = $_POST['usuario'];
        $contrasena =  $encriptar($_POST['contrasena']);

        if($this->model->insert(['nombres' => $nombres, 'apellidos' => $apellidos, 'area_trabajo' => $area_trabajo, 'usuario' => $usuario, 'contrasena' => $contrasena])){
            //header('location: '.constant('URL').'nuevo/alumnoCreado');
            $this->view->mensaje = "Categoría creado correctamente";
            $this->view->render('empleado/index');
        }else{
            $this->view->mensaje = "La categoría ya está registrada";
            $this->view->render('empleado/index');
        }
    }

}
