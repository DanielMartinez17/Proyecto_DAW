<?php

require 'models/venta.php';

class VentaModel extends Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getById($id)
    {
        $item = new Venta();
        try {
            $query = $this->db->connect()->prepare('SELECT * FROM venta WHERE id_venta = :id');

            $query->execute(['id' => $id]);

            while ($row = $query->fetch()) {

                $item->id_venta = $row['id_venta'];
                $item->fecha = $row['fecha'];
                $item->nom_cliente = $row['nom_cliente'];
                $item->estado = $row['estado'];
                $item->id_emple = $row['id_emple'];
            }
            return $item;
        } catch (PDOException $e) {
            return null;
        }
    }
}
?>