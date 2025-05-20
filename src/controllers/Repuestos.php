<?php

namespace Jeremias\StockRepuestosZoom\controllers;
use Jeremias\StockRepuestosZoom\models\Main;

class Repuestos
{
    private Main $con;

    public function __construct(Main $con)
    {
        $this->con = $con;
    }

    public function guardarRepuesto(string $repuesto = '', int $id_marca = 0, int $id_modelo = 0, int $stock = 0)
    {
        if ($repuesto == '' || $id_marca == 0 || $id_modelo == 0 || $stock == 0) {
            return [
                'title' => 'error',
                'message' => 'No se ha ingresado los datos en los campos obligatorios'
            ];
        }

        $sql = "INSERT INTO repuesto(id_mar, id_mod, repuesto, stock) VALUES (:id_mar, :id_mod, :repuesto, :stock);";
        $stmt = $this->con->con()->prepare($sql);
        $rst = $stmt->execute([
            ':id_mar' => $id_marca,
            ':id_mod' => $id_modelo,
            ':repuesto' => $repuesto,
            ':stock' => $stock
        ]);

        if (!$rst) {
            return [
                'title' => 'error',
                'message' => 'No se ha podido guardar los datos por favor intente nuevamente'
            ];
        }

        return [
            'title' => 'success',
            'message' => 'Se ha guardado los datos del repuesto correctamente'
        ];
    }
}