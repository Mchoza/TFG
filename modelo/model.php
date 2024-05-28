<?php

class Conexion {
    
    function __construct(){
        $this->bd_conect = new mysqli('localhost','root','','miLibreria');
        $this->bd_conect->set_charset("utf8mb4");


        if ($this->bd_conect->connect_errno) {
            die("Error al conectar a la base de datos: " . $this->bd_conect->connect_error);
        }

        $mensaje = "Conexión exitosa a la base de datos.";
        return $mensaje;
    }

    function __get($atribute){
        return $this->{$atribute};
    }

    }