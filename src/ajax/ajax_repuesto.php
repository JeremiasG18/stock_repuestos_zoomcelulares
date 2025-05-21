<?php

require_once '../../vendor/autoload.php';

use Jeremias\StockRepuestosZoom\models\Main;
use Jeremias\StockRepuestosZoom\controllers\Repuestos;

$con = new Main();
$repuesto = new Repuestos($con);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['guardar']) && $_POST['guardar'] == 'repuesto') {

        $vRepuesto = !empty($_POST['repuesto']) ? $_POST['repuesto'] : '';
        $marca = !empty($_POST['marca']) ? $_POST['marca'] : 0;
        $modelo = !empty($_POST['modelo']) ? $_POST['modelo'] : 0;
        $stock = !empty($_POST['stock']) ? $_POST['stock'] : 0;
        $rts = $repuesto->guardarRepuesto($vRepuesto, $marca, $modelo, $stock);
        echo json_encode($rts);
        exit;
    }

}


?>