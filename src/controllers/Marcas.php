<?php

namespace Jeremias\StockRepuestosZoom\controllers;
use Jeremias\StockRepuestosZoom\models\Main;

class Marcas
{
    private Main $con;

    public function __construct(Main $con)
    {
        $this->con = $con;
    }

    public function crearMarca(string $marca = ''){
        if ($marca == '' || empty($marca)) {
            return [
                'title' => 'error',
                'message' => 'No ha ingresado los datos en los campos obligatorios.'
            ];
        }

        $sql = 'INSERT INTO marca(marca) VALUES (:marca)';
        $stmt = $this->con->con()->prepare($sql);
        $rst = $stmt->execute([':marca' => $marca]);

        if (!$rst) {
            return [
                'title' => 'error',
                'message' => 'Ocurrio un error inesperado, por favor intente nuevamente'
            ];
        }

        return [
            'title' => 'success',
            'message' => 'Se ha insertado los datos correctamente',
        ];
    }

    public function listarMarca(string $marca = ''){

        if ($marca != '') {
            $sql = "SELECT id_mar, marca FROM marca WHERE marca LIKE :marca";
            $stmt = $this->con->con()->prepare($sql);
            $stmt->execute([':marca' => '%' . $marca . '%']);
            $rst = $stmt->fetchAll();
            return $rst;
        }

        $sql = "SELECT id_mar, marca FROM marca";
        $rst = $this->con->con()->query($sql)->fetchAll();
        return $rst;
    }
}