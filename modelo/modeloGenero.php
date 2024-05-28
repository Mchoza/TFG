<?php

class modeloGenero{

    public static function rellenaGenero($conexion){
         $consulta = "SELECT nombre_genero FROM genero";

        $resultados = $conexion->bd_conect->query($consulta);
        $mensaje="";
        while($fila = $resultados->fetch_assoc()){
            $mensaje .=$fila['nombre_genero'].";";

        }

        return $mensaje;
    }

}