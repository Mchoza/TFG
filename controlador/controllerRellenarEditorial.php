<?php
session_start();
//Conexion
require_once("../modelo/model.php");

//Modelos
require_once("../modelo/modeloEditorial.php");
$conexion = new Conexion();

$resultados = modeloEditorial::rellenaEditorial($conexion);

  echo $resultados;