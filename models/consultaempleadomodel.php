<?php
include_once 'libs/encript_desencipt.php';
require 'models/empleado.php';

class ConsultaEmpleadoModel extends Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function get()
    {
        $items = [];

        try {
            $query = $this->db->connect()->query('SELECT * FROM empleado');

            while ($row = $query->fetch()) {
                $item = new Empleado();

                $item->id_empleado = $row['id_empleado'];
                $item->nombres = $row['nombres'];
                $item->apellidos = $row['apellidos'];
                $item->area_trabajo = $row['area_trabajo'];
                $item->usuario = $row['usuario'];
                $item->contrasena = $row['contrasena'];
                $item->estado = $row['estado'];

                array_push($items, $item);
            }
            return $items;
        } catch (PDOException $e) {
            return [];
        }
    }

    public function getById($id)
    {
        $item = new Empleado();
        try {
            $query = $this->db->connect()->prepare('SELECT * FROM empleado WHERE id_empleado = :id');

            $query->execute(['id' => $id]);

            while ($row = $query->fetch()) {

                $item->id_empleado = $row['id_empleado'];
                $item->nombres = $row['nombres'];
                $item->apellidos = $row['apellidos'];
                $item->area_trabajo = $row['area_trabajo'];
                $item->usuario = $row['usuario'];
                $item->contrasena = $row['contrasena'];
                $item->estado = $row['estado'];
            }
            return $item;
        } catch (PDOException $e) {
            return null;
        }
    }

    public function update($item)
    {
        $a = $item['id_empleado'];
        echo $a;
        $prueba = $this->getById($a);

        $contra = $prueba->contrasena;

        if ($item['contrasena'] == $contra) {

            if ($item['area_trabajo'] == "") {
                $query = $this->db->connect()->prepare('UPDATE empleado SET nombres = :nombres, apellidos = :apellidos, usuario = :usuario WHERE id_empleado = :id_empleado');
                try {
                    $query->execute([
                        'id_empleado' => $item['id_empleado'],
                        'nombres' => $item['nombres'],
                        'apellidos' => $item['apellidos'],
                        'usuario' => $item['usuario']
                    ]);
                    return true;
                } catch (PDOException $e) {
                    return false;
                }
            } else {
                $query = $this->db->connect()->prepare('UPDATE empleado SET nombres = :nombres, apellidos = :apellidos, area_trabajo = :area_trabajo, usuario = :usuario WHERE id_empleado = :id_empleado');
                try {
                    $query->execute([
                        'id_empleado' => $item['id_empleado'],
                        'nombres' => $item['nombres'],
                        'apellidos' => $item['apellidos'],
                        'area_trabajo' => $item['area_trabajo'],
                        'usuario' => $item['usuario']
                    ]);
                    return true;
                } catch (PDOException $e) {
                    return false;
                }
            }

        } else {
            echo "son diferentes";
            $encriptar = new cls_encriptar_desencriptar();

            if ($item['area_trabajo'] == "") {
                $query = $this->db->connect()->prepare('UPDATE empleado SET nombres = :nombres, apellidos = :apellidos, usuario = :usuario, contrasena = :contrasena  WHERE id_empleado = :id_empleado');
                try {
                    $query->execute([
                        'id_empleado' => $item['id_empleado'],
                        'nombres' => $item['nombres'],
                        'apellidos' => $item['apellidos'],
                        'usuario' => $item['usuario'],
                        'contrasena' => $encriptar->encrypt($item['contrasena'])
                    ]);
                    return true;
                } catch (PDOException $e) {
                    return false;
                }
            } else {
                $query = $this->db->connect()->prepare('UPDATE empleado SET nombres = :nombres, apellidos = :apellidos, area_trabajo = :area_trabajo, usuario = :usuario, contrasena = :contrasena  WHERE id_empleado = :id_empleado');
                try {
                    $query->execute([
                        'id_empleado' => $item['id_empleado'],
                        'nombres' => $item['nombres'],
                        'apellidos' => $item['apellidos'],
                        'area_trabajo' => $item['area_trabajo'],
                        'usuario' => $item['usuario'],
                        'contrasena' => $encriptar->encrypt($item['contrasena'])
                    ]);
                    return true;
                } catch (PDOException $e) {
                    return false;
                }
            }


        }

    }

    public function delete($id)
    {
        $query = $this->db->connect()->prepare('DELETE FROM empleado WHERE id_empleado = :id_empleado');
        try {
            $query->execute([
                'id_empleado' => $id
            ]);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
}
?>