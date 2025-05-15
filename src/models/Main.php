<?php

class Main{
    private string $host;
    private string $user;
    private string $pass;
    private string $db_name;

    public function __construct() 
    {
        $this->host = 'localhost';
        $this->user = 'root';
        $this->pass = '';
        $this->db_name = 'stock_repuestos_zoomcelulares';
    }

    public function con()
    {
        $con = new PDO("mysql:host={$this->host};dbname={$this->db_name}", $this->user, $this->pass);
        if (!$con) {
            echo "La conexión a fallado";
        }
        return $con;
    }
}