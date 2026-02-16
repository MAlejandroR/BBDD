<?php

class BBDD
{
    private $conn;
    private $localhost;
    private $username;
    private $password;
    private $database;
    private $port;

    //Conectarnos a la base de datos
    //Verificar la conexión
    //Si no conectado dar un mensaje de error
    public function __construct()
    {
        //Leer las variables
        $this->localhost = $_ENV['LOCALHOST'];
        $this->username = $_ENV['USERNAME'];
        $this->password = $_ENV['PASSWORD'];
        $this->database = $_ENV['DATABASE'];
        $this->port = $_ENV['PORT'];

        try {
            $this->conn = new mysqli($this->localhost, $this->username, $this->password, $this->database, $this->port);
        } catch (Exception $e) {
            die("Connection failed: " . $e->getMessage());
        }


    }
    //Un array indexado con las tablas
    public function get_tables(){
        $sql = "SHOW TABLES";
        $tablas=[];
        $resultado = $this->conn->query($sql);
        $fila = $resultado->fetch_row();
        while ($fila) {
            $tablas[]=$fila[0];
            $fila = $resultado->fetch_row();
        }
        return $tablas;


    }


}
