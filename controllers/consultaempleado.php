<?php
include_once 'libs/encript_desencipt.php';

class ConsultaEmpleado extends Controller{
    function __construct(){
        parent::__construct();
        $this->view->mensaje = "";
    }

    function render(){
        $empleados = $this->view->empleados = $this->model->get();
        $this->view->empleados = $empleados;
        $this->view->render('consultaempleado/index');
    }

    function verEmpleado($param = null){
        $id_empleado = $param[0];
        $empleado = $this->model->getById($id_empleado);

        session_start();
        $_SESSION["id_verEmpleado"] = $empleado->id_empleado;

        $this->view->empleado = $empleado;
        $this->view->render('consultaempleado/detalle');
    }

    function actualizarEmpleado($param = null){

        session_start();
        $id_empleado = $_SESSION["id_verEmpleado"];
        $nombres    = $_POST['nombres'];
        $apellidos  = $_POST['apellidos'];
        $area_trabajo    = $_POST['area_trabajo'];
        $usuario  = $_POST['usuario'];
        $contrasena = $_POST['contrasena'];

        unset($_SESSION['id_verCategoria']);

        if($this->model->update(['id_empleado' => $id_empleado, 'nombres' => $nombres, 'apellidos' => $apellidos, 'area_trabajo' => $area_trabajo, 'usuario' => $usuario, 'contrasena' => $contrasena])){
            $empleado = new Empleado();
            $empleado->id_empleado = $id_empleado;
            $empleado->nombres = $nombres;
            $empleado->apellidos = $apellidos;
            $empleado->area_trabajo = $area_trabajo;
            $empleado->usuario = $usuario;
            $empleado->contrasena = $contrasena;
            

            $this->view->empleado = $empleado;
            $this->view->mensaje = "Actualizado correctamente";
        }else{
            $this->view->mensaje = "No se pudo actualizar";
        }
        $this->view->render('consultaempleado/detalle');
    }

    function eliminarEmpleado($param = null){
        $empleado = $param[0];

        if($this->model->delete($empleado)){
            $mensaje ="Registro eliminado correctamente";
            //$this->view->mensaje = "Alumno eliminado correctamente";
        }else{
            $mensaje = "No se pudo eliminar el registro";
            //$this->view->mensaje = "No se pudo eliminar al alumno";
        }

        //$this->render();

        echo $mensaje;
    }
}

?>