<?php

class cls_encriptar_desencriptar{
    public function encriptar_desencriptar($accion,$texto){
        $output=false;
        $encriptarmetodo="AES-256-CBC";
        $palabrasecreta="mi clave para encriptar";
        $iv="C9FBL1EWSD/M8JFTGS==";
        $key=hash("sha256",$palabrasecreta);
        $siv=substr(hash("sha256",$iv),0,16);
        if($accion=="encriptar"){
            $salida=openssl_encrypt($texto,$encriptarmetodo,$key,0,$siv);
            echo $salida;
        }else if($accion=="desencriptar"){
            $salida=openssl_decrypt($texto,$encriptarmetodo,$key,0,$siv);
            echo $salida;
        }
        return $output;
    }
}

?>