<?php

namespace App\Models\Admin;

use Core\Model;
use PDO;

class productos extends model
{
    protected $table = 'productos';

    public function registrar($data) {
        $sql = "INSERT INTO  ($this->table) (categoria ,codigo ,nombre,descripcion,precio_venta,stock_actual) VALUES (:categoria, :codigo, :nombre, :descripcion, :precio_venta, :stock_actual)";
        $params = [
            ':categoria' => $data['categoria'],
            ':codigo' => $data['codigo'],
            ':nombre' => $data['nombre'],
            ':descripcion' => $data['descripcion'],
            ':precio_venta' => $data['precio_venta'],
            ':stock_actual' => $data['stock_actual']
        ];
        $preparado = $this->db->prepare($sql);
        return $preparado->execute($params);
    }
    public function buscar() {
        $sql = "SELECT p.*, C.nombre AS categoria_nombre FROM $this->table AS p INNER JOIN categorias AS C ON p.categoria = C.id";
        $preparado = $this->db->prepare($sql);
        $preparado->execute();
        return $preparado->fetchAll(PDO::FETCH_ASSOC);
    }
    public function ver() {}
    public function actualizar() {}
    public function eliminar() {}
}
