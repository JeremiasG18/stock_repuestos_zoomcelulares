<?php

require '../models/Main.php';
require '../controllers/Modelo.php';

$con = new Main();
$modelo = new Modelo($con);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['guardar']) && $_POST['guardar'] == 'modelo') {
        $vModelo = !empty($_POST['modelo']) ? $_POST['modelo'] : '';
        $rst = $modelo->guardarModelo($vModelo);
        echo json_encode($rst);
        exit;
    }

    if ($_POST['buscar'] == 'modelo'){
        $vModelo = !empty($_POST['modelo']) ? $_POST['modelo'] : '';
        $rst = $modelo->listarModelos($vModelo);
        echo json_encode($rst);
        exit;
    }
}