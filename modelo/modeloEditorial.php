<?php

class modeloEditorial{

    public static function rellenaEditorial($conexion){
         $consulta = "SELECT nombre_editorial FROM editorial";

        $resultados = $conexion->bd_conect->query($consulta);
        $mensaje="";
        while($fila = $resultados->fetch_assoc()){
            $mensaje .=$fila['nombre_editorial'].";";

        }

        return $mensaje;
    }



}