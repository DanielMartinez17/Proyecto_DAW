<?php
class Pedido extends Controller
{
    function __construct()
    {
        parent::__construct();
        $this->view->mensaje = "";
    }

    function render()
    { 
        $this->view->render('pedido/index');
    }

    function verVenta()
    { 
        $this->view->render('pedido/detalle');
    }
    function eliminarVenta($param = null){
        $empleado = $param[0];

        if($this->model->delete($empleado)){
            $mensaje ="Registro eliminado correctamente";
            //$this->view->mensaje = "Alumno eliminado correctamente";
        }else{
            $mensaje = "No se pudo eliminar el registro";
            //$this->view->mensaje = "No se pudo eliminar al alumno";
        }

        $this->view->render('pedido/eliminar');

        //echo $mensaje;
    }
}
?>