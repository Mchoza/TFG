<?php
session_start();
//Conexion
require_once("../modelo/model.php");

//Modelos
require_once("../modelo/modeloFrasesAleatorias.php");

 $conexion = new Conexion();

 $resultados = modeloFrasesAleatorias::fraseAleatoria($conexion);

 echo $resultados;


    


?>