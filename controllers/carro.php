<?php
class Carro extends Controller
{
    function __construct()
    {
        parent::__construct();
        $this->view->mensaje = "";
    }

    function render()
    { 
        $this->view->render('carro/index');
    }

    function verProductos()
    { 
        $this->view->render('carro/index');
    }

    function verCarrito()
    { 
        $this->view->render('carro/cart');
    }
}
?>