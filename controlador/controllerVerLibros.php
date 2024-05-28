<?php
session_start();
//Conexion
require_once("../modelo/model.php");

//Modelos
require_once("../modelo/modeloLibros.php");
$titulo = $_GET['titulo'];
$conexion = new Conexion();


    $resultados = modeloLibros::verLibros($conexion, $titulo);

  echo $resultados;







  