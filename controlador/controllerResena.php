<?php
session_start();
//Conexion
require_once("../modelo/model.php");

//Modelos
require_once("../modelo/modeloResena.php");
// $titulo = $_GET['titulo'];
$conexion = new Conexion();


    $resultados = modeloResena::rellenaResenas($conexion);

    echo $resultados;