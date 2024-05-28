<?php

class modeloLibros{

    public static function rellenaLibros($conexion){
         $consulta = "SELECT titulo, foto, sinopsis FROM libro";

        $resultados = $conexion->bd_conect->query($consulta);
        $mensaje="";
        while($fila = $resultados->fetch_assoc()){
            $mensaje .=$fila['titulo'].";".$fila['foto'].";".$fila['sinopsis'].";";

        }

        return $mensaje;
    }

    public static function verLibros($conexion, $titulo){
        $consulta = "SELECT titulo, autor, foto, sinopsis, num_paginas FROM libro WHERE titulo = '$titulo'";


       $resultados = $conexion->bd_conect->query($consulta);
       $mensaje="";
       while($fila = $resultados->fetch_assoc()){
           $mensaje =$fila['titulo'].";".$fila['autor'].";".$fila['foto'].";".$fila['sinopsis'].";".$fila['num_paginas'];

       }

       return $mensaje;
   }

   public static function rellenaDesplegable($conexion){
        $consulta = "SELECT titulo FROM libro ";
        $resultados = $conexion->bd_conect->query($consulta);
        $mensaje="";
        while($fila = $resultados->fetch_assoc()){
            $mensaje .=$fila['titulo'].";";
 
        }
        return $mensaje;
   }

}