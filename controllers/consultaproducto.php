<?php

class ConsultaProducto extends Controller{
    function __construct(){
        parent::__construct();
        $this->view->mensaje = "";
    }

    function render(){
        $productos = $this->view->productos = $this->model->get();
        $this->view->productos = $productos;
        $this->view->render('consultaproducto/index');
    }

    function verProducto($param = null){
        $id_producto = $param[0];
        $producto = $this->model->getById($id_producto);

        session_start();
        $_SESSION["id_verProducto"] = $producto->id_producto;

        $this->view->producto = $producto;
        $this->view->render('consultaproducto/detalle');
    }

    function actualizarProducto($param = null){
        session_start();

        if (isset($_FILES['imagen'])) {
            $ruta = "/xampp/htdocs/Proyecto_DAW/public/img_products/";
            $nombre_temporal = $_FILES['imagen']['tmp_name'];
            $nombre_imagen = $_FILES['imagen']['name'];
            move_uploaded_file($nombre_temporal, $ruta . $nombre_imagen);
        }

        $id_producto = $_SESSION["id_verProducto"];
        $nombre  = $_POST['nombre'];
        $precio  = is_numeric($_POST['precio']) ? $_POST['precio'] : 0;
        $stok  =  is_numeric($_POST['stok']) ? $_POST['stok'] : 0;
        $imagen  = $_FILES['imagen']['name'];
        $id_categoria = $_POST['id_categoria'];

        unset($_SESSION['id_verProducto']);

        if($this->model->update(['id_producto' => $id_producto, 'nombre' => $nombre, 'precio' => $precio, 'stok' => $stok, 'imagen' => $imagen, 'id_categoria' => $id_categoria])){
            $producto = new Producto();
                $producto->id_producto = $id_producto;
                $producto->nombre = $nombre;
                $producto->precio = $precio;
                $producto->stok = $stok;
                $producto->imagen = $imagen;
                $producto->id_categoria = $id_categoria;
            

            $this->view->producto = $producto;
            $this->view->mensaje = "Producto actualizado correctamente";
        }else{
            $this->view->mensaje = "No se pudo actualizar al producto";
        }
        $this->view->render('consultaproducto/detalle');
    }

    function eliminarProducto($param = null){
        $producto = $param[0];

        if($this->model->delete($producto)){
            $mensaje ="Producto eliminado correctamente";
            //$this->view->mensaje = "Alumno eliminado correctamente";
        }else{
            $mensaje = "No se pudo eliminar al producto";
            //$this->view->mensaje = "No se pudo eliminar al alumno";
        }

        //$this->render();

        echo $mensaje;
    }

    
}

?>