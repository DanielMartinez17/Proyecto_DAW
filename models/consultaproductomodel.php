<?php

require 'models/producto.php';

class ConsultaProductoModel extends Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function get()
    {
        $items = [];
        try {
            $query = $this->db->connect()->query('SELECT * FROM producto');

            while ($row = $query->fetch()) {
                $item = new Producto();

                $item->id_producto = $row['id_producto'];
                $item->nombre = $row['nombre'];
                $item->precio = $row['precio'];
                $item->stok = $row['stok'];
                $item->imagen = $row['imagen'];
                $item->id_categoria = $row['id_categoria'];

                array_push($items, $item);
            }
            return $items;
        } catch (PDOException $e) {
            return [];
        }
    }

    public function getById($id)
    {
        $item = new Producto();
        try {
            $query = $this->db->connect()->prepare('SELECT * FROM producto WHERE id_producto = :id');

            $query->execute(['id' => $id]);

            while ($row = $query->fetch()) {

                $item->id_producto = $row['id_producto'];
                $item->nombre = $row['nombre'];
                $item->precio = $row['precio'];
                $item->stok = $row['stok'];
                $item->imagen = $row['imagen'];
                $item->id_categoria = $row['id_categoria'];
            }
            return $item;
        } catch (PDOException $e) {
            return null;
        }
    }

    public function update($item)
    {

        if ($item['imagen'] != "") {
            $query = $this->db->connect()->prepare('UPDATE producto SET nombre = :nombre, precio = :precio, stok =:stok, imagen = :imagen, id_categoria = :id_categoria WHERE id_producto = :id_producto');
            try {
                $query->execute([
                    'id_producto' => $item['id_producto'],
                    'nombre' => $item['nombre'],
                    'precio' => $item['precio'],
                    'stok' => $item['stok'],
                    'imagen' => $item['imagen'],
                    'id_categoria' => $item['id_categoria']

                ]);
                return true;
            } catch (PDOException $e) {
                return false;
            }
        }else {
            $query = $this->db->connect()->prepare('UPDATE producto SET nombre = :nombre, precio = :precio, stok =:stok, id_categoria = :id_categoria WHERE id_producto = :id_producto');
            try {
                $query->execute([
                    'id_producto' => $item['id_producto'],
                    'nombre' => $item['nombre'],
                    'precio' => $item['precio'],
                    'stok' => $item['stok'],
                    'id_categoria' => $item['id_categoria']

                ]);
                return true;
            } catch (PDOException $e) {
                return false;
            }
        }


    }

    public function delete($id)
    {
        $query = $this->db->connect()->prepare('DELETE FROM producto WHERE id_producto = :id_producto');
        try {
            $query->execute([
                'id_producto' => $id
            ]);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
}
?>