<?php

class ProductoModel extends Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function insert($datos)
    {
        $consulta = $this->db->connect()->query("SELECT * FROM producto WHERE nombre = '" . $datos['nombre'] . "'");
        $validacion = $consulta->rowCount();

        if ($validacion <= 0) { {
                // insertar
                $query = $this->db->connect()->prepare('INSERT INTO producto (nombre, precio, stok, imagen, id_categoria, estado) VALUES(:nombre, :precio, :stok, :imagen, :id_categoria, 1)');
                try {
                    $query->execute([
                        'nombre' => $datos['nombre'],
                        'precio' => $datos['precio'],
                        'stok' => $datos['stok'],
                        'imagen' => $datos['imagen'],
                        'id_categoria' => $datos['id_categoria']

                    ]);
                    return true;
                } catch (PDOException $e) {
                    return false;
                }
            }




        }
    }
}

?>