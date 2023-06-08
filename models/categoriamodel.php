<?php



class CategoriaModel extends Model{

    public function __construct(){
        parent::__construct();
    }

    public function insert($datos){
        // insertar
        $query = $this->db->connect()->prepare('INSERT INTO categoria (nombre, descripcion, estado) VALUES(:nombre, :descripcion, 1)');
        try{
            $query->execute([
                'nombre' => $datos['nombre'],
                'descripcion' => $datos['descripcion']
            ]);
            return true;
        }catch(PDOException $e){
            return false;
        }
        
        
    }
}

?>