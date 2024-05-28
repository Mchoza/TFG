<?php
session_start();
//Conexion
require_once("../modelo/model.php");

//Modelos
require_once("../modelo/modeloFrasesAleatorias.php");

$cita = $_GET["cita"];
$libro = $_GET["libro"];
$autor = $_GET["autor"];


 $conexion = new Conexion();

 $resultados = modeloFrasesAleatorias::anadirFraseAleatoria($conexion, $cita, $libro, $autor);


echo $resultados;

    


?>