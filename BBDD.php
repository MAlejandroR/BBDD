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

    /**
     * @param string $table nombre de la tabla de la que quiero sus campos
     * @return array indexado con los nombres de los campos de la tabla
     */
    public function get_headers(string $table):array{
        $sql ="describe  $table";
        $resultado = $this->conn->query($sql);
        $fila = $resultado->fetch_row();

        while ($fila) {

            $headers[]=$fila[0];
            $fila = $resultado->fetch_row();
        }
        return $headers;
    }

    /**
     * @param string $table nombre de la tabla de la que quiero las filas
     * @return array indexado con las filas de la tabla (cada final un array indexado también)
     */
    public function get_rows(string $table):array
    {
        $sql = "SELECT * FROM $table"; //sentencia que quiero ejecutar
        $resultado = $this->conn->query($sql); //Ejecuto la sentencia y obtengo el resultado
        //En php $resultado sería un objeto de la clase mysqli_result

        $fila = $resultado->fetch_row(); //Extraigo una fila de la constula
        //La extraigo como un array indexado (fetch_row)
        //La podría extraer con fetch_assoc (array asociativo) fetch_object (objeto)
        while ($fila) {
            $rows[]=$fila; //Voy incorporando lo que me interesa en el array que quiero devolver
            $fila = $resultado->fetch_row();
        }
        return $rows;

    }


}
