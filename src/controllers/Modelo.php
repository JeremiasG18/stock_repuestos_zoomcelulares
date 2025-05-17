<?php

class Modelo
{
    private Main $con;
    
    public function __construct(Main $con)
    {
        $this->con = $con;
    }

    public function guardarModelo(string $modelo = ''){
        if ($modelo == '') {
            return [
                'title' => 'error',
                'message' => 'No se ha ingresado los datos en los campos obligatorios'
            ];
        }

        $sql = "INSERT INTO modelo(modelo) VALUES (:modelo);";
        $stmt = $this->con->con()->prepare($sql);
        $rst = $stmt->execute([
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
}