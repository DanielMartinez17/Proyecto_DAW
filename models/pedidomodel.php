<?php
class PedidoModel extends Model
{

    public function __construct()
    {
        parent::__construct();
    }

    

    public function delete($id)
    {
        $query = $this->db->connect()->prepare('UPDATE Venta SET estado = 0 WHERE id_venta = :id_venta');
        try {
            $query->execute([
                'id_venta' => $id
            ]);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
}
?>