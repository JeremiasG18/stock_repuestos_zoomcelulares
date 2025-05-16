<?php

require '../models/Main.php';
require '../controllers/Marcas.php';

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

    $json = file_get_contents('php://input');
    $_POST = json_decode($json, true);
    if (isset($_POST['buscar'])) {
        if ($_POST['buscar'] == 'marca'){
            $rst = $marca->listarMarca();
            echo json_encode($rst);
            exit;
        }
    }
}