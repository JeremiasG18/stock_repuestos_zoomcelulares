<?php

require 'public/templates/header.php';
require 'public/templates/navbar.php';

$_GET['view'] = empty($_GET['view']) ? 'repuestos' : $_GET['view'];

if (is_file("src/views/{$_GET['view']}.php")){
    require "src/views/{$_GET['view']}.php";
}else{
    require "src/views/404.php";
}

require 'public/templates/footer.php';


?>