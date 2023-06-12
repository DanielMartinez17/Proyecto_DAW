<?php


require_once("config.php");

class Database{
    private $host;
    private $user;
    private $password;
    private $db;
    public function __construct()
    {
        $this->host=constant("HOST");
        $this->user=constant("USER");
        $this->password=constant("CLAVE");
        $this->db=constant("DB");
    }

    public function connect(){
        $pdo="";
        try{
            $pdo=new mysqli($this->host,$this->user,$this->password,$this->db);
        }catch(Exception $e){
            //echo $e;//->errorMessage();
        }

        return $pdo;
    }

}

?>