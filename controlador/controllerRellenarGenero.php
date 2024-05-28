<?php
session_start();
//Conexion
require_once("../modelo/model.php");

//Modelos
require_once("../modelo/modeloGenero.php");
$conexion = new Conexion();

  $resultados = modeloGenero::rellenaGenero($conexion);

  echo $resultados;