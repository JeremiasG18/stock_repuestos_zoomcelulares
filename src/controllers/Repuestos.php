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

    public function guardarRepuesto(int $id_modelo = 0, string $repuesto = '', int $stock = 0)
    {
        if ($id_modelo == 0 || $repuesto == '' || $stock == 0) {
            return [
                'title' => 'error',
                'message' => 'No se ha ingresado los datos en los campos obligatorios'
            ];
        }

        $sql = "INSERT INTO repuesto(id_mod, repuesto, stock) VALUES (:id_mod, :repuesto, :stock);";
        $stmt = $this->con->con()->prepare($sql);
        $rst = $stmt->execute([
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

    public function listarRepuestos()
    {
        // if ($repuesto != '') {
        //     $sql = "SELECT id_rep, repuesto FROM repuesto WHERE repuesto LIKE :repuesto";
        //     $stmt = $this->con->con()->prepare($sql);
        //     $stmt->execute([':repuesto' => '%' . $repuesto . '%']);
        //     $rst = $stmt->fetchAll();
        //     return $rst;
        // }

        $sql = "SELECT r.id, m.modelo, c.marca, r.repuesto, r.stock FROM repuesto r INNER JOIN modelo m ON r.id_mod = m.id_mod INNER JOIN marca c ON m.id_mar = c.id_mar;";
        $rst = $this->con->con()->query($sql)->fetchAll();
        return $rst;
    }

    
}