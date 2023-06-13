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

   // function verProductos()
   // { 
   //     $this->view->render('carro/index');
   // }
}
?>