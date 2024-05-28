<?php
//Conexion
require_once("../modelo/model.php");

//Modelos
require_once("../modelo/modeloResena.php");
$conexion = new Conexion();

$titulo = $_GET['titulo'];
$resena = $_GET['resena'];
$estrellas = $_GET['estrellas'];

  $resultados = modeloResena::anadirResena($conexion, $titulo, $resena, $estrellas);

  echo $resultados;