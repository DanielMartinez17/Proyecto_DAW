<?php

class cls_encriptar_desencriptar{
    public function encrypt($texto){
        $encriptarmetodo="AES-256-CBC";
        $palabrasecreta="Trabajo final Mr. Potato";
        $iv="C9FBL1EWSD/M8JFTGS==";
        $key=hash("sha256",$palabrasecreta);
        $siv=substr(hash("sha256",$iv),0,16);
        $salida=openssl_encrypt($texto,$encriptarmetodo,$key,0,$siv);
        return $salida;
    }
    
    public function decrypt($texto){
        $encriptarmetodo="AES-256-CBC";
        $palabrasecreta="Trabajo final Mr. Potato";
        $iv="C9FBL1EWSD/M8JFTGS==";
        $key=hash("sha256",$palabrasecreta);
        $siv=substr(hash("sha256",$iv),0,16);
        $salida=openssl_decrypt($texto,$encriptarmetodo,$key,0,$siv);
        return $salida;
    }
}

?>