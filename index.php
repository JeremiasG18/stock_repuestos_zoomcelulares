<?php

require 'src/models/Main.php';

$con = new Main();
$query = "INSERT INTO marca(marca) VALUES (:marca)";
$stm = $con->con()->prepare($query);
$stm->execute(['marca' => 'Samsung']);

?>