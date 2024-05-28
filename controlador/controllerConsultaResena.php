<?php
session_start();
//Conexion
require_once("../modelo/model.php");

//Modelos
require_once("../modelo/modeloResena.php");

$conexion = new Conexion();


    $resultados = modeloResena::consultaResenas($conexion);

  echo $resultados;