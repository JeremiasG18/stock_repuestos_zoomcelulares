<?php

require_once '../../vendor/autoload.php';
use Jeremias\StockRepuestosZoom\models\Main;
use Jeremias\StockRepuestosZoom\controllers\Marcas;

$con = new Main();
$marca = new Marcas($con);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['guardar'])) {
        if ($_POST['guardar'] == 'marca') {
            $vMarca = !empty($_POST['marca']) != '' ? $_POST['marca'] : '';
            $rst = $marca->crearMarca($vMarca);
            echo json_encode($rst);
            exit;
        }
    }

    if (isset($_POST['buscar'])) {
        if ($_POST['buscar'] == 'marca'){
            $vMarca = !empty($_POST['marca']) ? $_POST['marca'] : '';
            $rst = $marca->listarMarca($vMarca);
            echo json_encode($rst);
            exit;
        }
    }
}