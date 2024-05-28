<?php
session_start();
//Conexion
require_once("../modelo/model.php");

//Modelos
require_once("../modelo/modeloResena.php");
$titulo = $_GET['titulo'];
$resena = $_GET['resena'];
$conexion = new Conexion();


    $resultados = modeloResena::modificarResena($conexion, $resena, $titulo);

  echo $resultados;