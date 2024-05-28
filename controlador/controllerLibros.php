<?php
session_start();
//Conexion
require_once("../modelo/model.php");

//Modelos
require_once("../modelo/modeloLibros.php");
$conexion = new Conexion();


    $resultados = modeloLibros::rellenaLibros($conexion);







  echo $resultados;








  