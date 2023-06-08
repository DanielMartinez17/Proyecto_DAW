<?php



class ConsultaCategoria extends Controller{
    function __construct(){
        parent::__construct();
        $this->view->mensaje = "";
    }

    function render(){
        $categorias = $this->view->categorias = $this->model->get();
        $this->view->categorias = $categorias;
        $this->view->render('consultacategoria/index');
    }

    function verCategoria($param = null){
        $id_categoria = $param[0];
        $categoria = $this->model->getById($id_categoria);

        session_start();
        $_SESSION["id_verCategoria"] = $categoria->id_categoria;

        $this->view->categoria = $categoria;
        $this->view->render('consultacategoria/detalle');
    }

    function actualizarCategoria($param = null){
        session_start();
        $id_categoria = $_SESSION["id_verCategoria"];
        $nombre    = $_POST['nombre'];
        $descripcion  = $_POST['descripcion'];


        unset($_SESSION['id_verCategoria']);

        if($this->model->update(['id_categoria' => $id_categoria, 'nombre' => $nombre, 'descripcion' => $descripcion])){
            $categoria = new Categoria();
            $categoria->id_categoria = $id_categoria;
            $categoria->nombre = $nombre;
            $categoria->descripcion = $descripcion;
            

            $this->view->categoria = $categoria;
            $this->view->mensaje = "Alumno actualizado correctamente";
        }else{
            $this->view->mensaje = "No se pudo actualizar al alumno";
        }
        $this->view->render('consultacategoria/detalle');
    }

    function eliminarCategoria($param = null){
        $categoria = $param[0];

        if($this->model->delete($categoria)){
            $mensaje ="Alumno eliminado correctamente";
            //$this->view->mensaje = "Alumno eliminado correctamente";
        }else{
            $mensaje = "No se pudo eliminar al alumno";
            //$this->view->mensaje = "No se pudo eliminar al alumno";
        }

        //$this->render();

        echo $mensaje;
    }

    
}

?>