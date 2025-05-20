<?php

require_once '../../vendor/autoload.php';
use Jeremias\StockRepuestosZoom\models\Main;
use Jeremias\StockRepuestosZoom\controllers\Modelo;

$con = new Main();
$modelo = new Modelo($con);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['guardar']) && $_POST['guardar'] == 'modelo') {
        $marca = !empty($_POST['marca']) ? $_POST['marca'] : '';
        $vModelo = !empty($_POST['modelo']) ? $_POST['modelo'] : '';
        $rst = $modelo->guardarModelo($marca, $vModelo);
        echo json_encode($rst);
        exit;
    }

    if (isset($_POST['buscar']) && $_POST['buscar'] == 'modelo'){
        $vModelo = !empty($_POST['modelo']) ? $_POST['modelo'] : '';
        $rst = $modelo->listarModelos($vModelo);
        echo json_encode($rst);
        exit;
    }

    if (isset($_POST['buscar_por_id']) && $_POST['buscar_por_id'] == 'modelo') {
        $id = !empty($_POST['id']) ? $_POST['id'] : '';
        $rst = $modelo->listarModeloById($id);
        echo json_encode($rst);
        exit;
    }
    
}