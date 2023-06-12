<?php

/*class App{
    function __construct()
    {
        //echo "<h1>Nueva aplicacion</h1> ";
        if(isset($_GET["url"])){
            $url=$_GET["url"];
            $url=rtrim($url,'/');
            $url=explode('/',$url);
            $archivoControlador="controllers/".$url[0].".php";

            if(file_exists($archivoControlador)){
                require_once($archivoControlador);
                //cargamos el controlador
                $controlador=new $url[0];
                //$controlador->loadModel("nuevomodelo");
                if(isset($url[1])){
                    $controlador->{$url[1]}();
                }
            }else{
                require_once("controllers/error.php");
                $controlador= new Error_sistema();
            }
        }
        
    }
}*/

?>