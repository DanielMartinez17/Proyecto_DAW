<?php
class Informe extends Controller
{
    function __construct()
    {
        parent::__construct();
        $this->view->mensaje = "";
    }

    function render()
    { 
        $this->view->render('informe/index');
    }

   function verFactura()
    { 
        $this->view->render('informe/factura');
    }

    function verVenta()
    { 
        $this->view->render('informe/ventas');
    }

    function verProducto()
    { 
        $this->view->render('informe/productos');
    }
}
?>