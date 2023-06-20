<?php
class Stok extends Controller
{
    function __construct()
    {
        parent::__construct();
        $this->view->mensaje = "";
    }

    function render()
    { 
        $this->view->render('stok/index');
    }
}
?>