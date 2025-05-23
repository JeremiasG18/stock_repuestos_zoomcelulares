<?php

require_once '../../vendor/autoload.php';

use Jeremias\StockRepuestosZoom\models\Main;
use Jeremias\StockRepuestosZoom\controllers\Repuestos;

$con = new Main();
$repuesto = new Repuestos($con);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['guardar']) && $_POST['guardar'] == 'repuesto') {

        $modelo = !empty($_POST['modelo']) ? $_POST['modelo'] : 0;
        $vRepuesto = !empty($_POST['repuesto']) ? $_POST['repuesto'] : '';
        $stock = !empty($_POST['stock']) ? $_POST['stock'] : 0;
        $rts = $repuesto->guardarRepuesto($modelo, $vRepuesto, $stock);
        echo json_encode($rts);
        exit;
    }

    if (isset($_POST['buscar']) && $_POST['buscar'] == 'repuesto') {
        $rst = $repuesto->listarRepuestos();
        echo json_encode($rst);
        exit;
    }

    if (isset($_POST['eliminar']) && $_POST['eliminar'] == 'repuesto') {
        $vRepuesto = !empty($_POST['id_repuesto']) ? $_POST['id_repuesto'] : 0;
        $rts = $repuesto->eliminarRepuesto($vRepuesto);
        echo json_encode($rts);
    }

}


?>