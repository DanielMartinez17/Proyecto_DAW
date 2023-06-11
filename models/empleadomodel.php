<?php

class EmpleadoModel extends Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function insert($datos)
    {
        $consulta = $this->db->connect()->query("SELECT * FROM empleado WHERE nombres = '" . $datos['nombres'] . "' AND apellidos = '".$datos['apellidos']."'");
        $validacion = $consulta->rowCount();

        if ($validacion <= 0) { {
                // insertar
                $query = $this->db->connect()->prepare('INSERT INTO empleado (nombres, apellidos, area_trabajo, usuario, contrasena, estado) VALUES(:nombres, :apellidos, :area_trabajo, :usuario, :contrasena, 1)');
                try {
                    $query->execute([
                        'nombres' => $datos['nombres'],
                        'apellidos' => $datos['apellidos'],
                        'area_trabajo' => $datos['area_trabajo'],
                        'usuario' => $datos['usuario'],
                        'contrasena' => $datos['contrasena']
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