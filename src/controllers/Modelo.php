<?php

namespace Jeremias\StockRepuestosZoom\controllers;
use Jeremias\StockRepuestosZoom\models\Main;

class Modelo
{
    private Main $con;
    
    public function __construct(Main $con)
    {
        $this->con = $con;
    }

    public function guardarModelo(int $marca = 0,  string $modelo = ''){
        if ($marca == '' || $modelo == '') {
            return [
                'title' => 'error',
                'message' => 'No se ha ingresado los datos en los campos obligatorios'
            ];
        }

        $sql = "INSERT INTO modelo(id_mar, modelo) VALUES (:marca, :modelo);";
        $stmt = $this->con->con()->prepare($sql);
        $rst = $stmt->execute([
            ':marca' => $marca,
            ':modelo' => $modelo
        ]);

        if (!$rst) {
            return [
                'title' => 'error',
                'message' => 'No se ha podido guardar los datos por favor intente nuevamente'
            ];
        }

        return [
            'title' => 'success',
            'message' => 'Se ha guardado los datos del modelo correctamente'
        ];
    }

    public function listarModelos(string $modelo = ''){

        if ($modelo != '') {
            $sql = "SELECT id_mod, modelo FROM modelo WHERE modelo LIKE :modelo";
            $stmt = $this->con->con()->prepare($sql);
            $stmt->execute([':modelo' => '%' . $modelo . '%']);
            $rst = $stmt->fetchAll();
            return $rst;
        }

        $sql = "SELECT id_mod, modelo FROM modelo";
        $rst = $this->con->con()->query($sql)->fetchAll();
        return $rst;
    }

    public function listarModeloById(int $id = 0){
        if ($id != 0) {
            $sql = "SELECT id_mod, modelo FROM modelo WHERE id_mar = :id";
            $stmt = $this->con->con()->prepare($sql);
            $stmt->execute([':id' => $id]);
            return $stmt->fetchAll();
        }
    }
}