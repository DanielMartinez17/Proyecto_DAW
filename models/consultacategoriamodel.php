<?php

require 'models/categoria.php';

class ConsultaCategoriaModel extends Model{

    public function __construct(){
        parent::__construct();
    }

    public function get(){
        $items = [];
        try{
            $query = $this->db->connect()->query('SELECT * FROM categoria');
            
            while($row = $query->fetch()){
                $item = new Categoria();

                $item->id_categoria = $row['id_categoria'];
                $item->nombre = $row['nombre'];
                $item->descripcion = $row['descripcion'];
                $item->estado = $row['estado'];

                array_push($items, $item);
            }
            return $items;
        }catch(PDOException $e){
            return [];
        }
    }

    public function getById($id){
        $item = new Categoria();
        try{
            $query = $this->db->connect()->prepare('SELECT * FROM categoria WHERE id_categoria = :id');

            $query->execute(['id' => $id]);
            
            while($row = $query->fetch()){
                
                $item->id_categoria = $row['id_categoria'];
                $item->nombre = $row['nombre'];
                $item->descripcion = $row['descripcion'];
                $item->estado = $row['estado'];
            }
            return $item;
        }catch(PDOException $e){
            return null;
        }
    }

    public function update($item){
        $query = $this->db->connect()->prepare('UPDATE categoria SET nombre = :nombre, descripcion = :descripcion WHERE id_categoria = :id_categoria');
        try{
            $query->execute([
                'id_categoria' => $item['id_categoria'],
                'nombre' => $item['nombre'],
                'descripcion' => $item['descripcion']
                
            ]);
            return true;
        }catch(PDOException $e){
            return false;
        }
    }

    public function delete($id){
        $query = $this->db->connect()->prepare('DELETE FROM categoria WHERE id_categoria = :id_categoria');
        try{
            $query->execute([
                'id_categoria' => $id
            ]);
            return true;
        }catch(PDOException $e){
            return false;
        }
    }
}
?>