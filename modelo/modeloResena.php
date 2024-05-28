<?php

class modeloResena{

    public static function rellenaResenas($conexion){
         $consulta = "SELECT libro.titulo, libro.foto, resena.resena, resena.estrellas, resena.fecha_creacion FROM resena INNER JOIN libro ON resena.isbn = libro.isbn";


        $resultados = $conexion->bd_conect->query($consulta);
        $mensaje="";
        while($fila = $resultados->fetch_assoc()){
            $mensaje .=$fila['titulo'].";".$fila['foto'].";".$fila['resena'].";".$fila['estrellas'].";".$fila['fecha_creacion'].";";

        }

        return $mensaje;
    }

    public static function verResenas($conexion, $titulo){
        $consulta = "SELECT l.titulo, l.foto, r.resena, r.estrellas, r.fecha_creacion FROM libro l JOIN resena r ON l.isbn = r.isbn WHERE l.titulo = '$titulo'";
        
        $resultados = $conexion->bd_conect->query($consulta);
        $mensaje="";
        while($fila = $resultados->fetch_assoc()){
            $mensaje .=$fila['titulo'].";".$fila['foto'].";".$fila['resena'].";".$fila['estrellas'].";".$fila['fecha_creacion'].";";

        }

        return $mensaje;
    }

    public static function anadirResena($conexion, $titulo, $resena, $estrellas){
        $consulta = "SELECT isbn FROM libro WHERE titulo = '$titulo'";
        $mensaje = $conexion->bd_conect->query($consulta);

        
        $resultados ="";
        //Comprobamos que no existe la resena para un isbn dado
        
            $isbn="";
            while($fila = $mensaje->fetch_assoc()){
                $isbn .=$fila['isbn'];
     
            }


//ver si existe
$existe = "SELECT COUNT(*) AS cantidad FROM resena WHERE isbn = '$isbn'";
$exOno = $conexion->bd_conect->query($existe);

$filaCantidad = $exOno->fetch_assoc();
$cantidad = $filaCantidad['cantidad'];
     
     if($cantidad==0){
            $insercion = "INSERT INTO resena (isbn, resena, estrellas, fecha_creacion) VALUES ('$isbn', '$resena', '$estrellas', NOW())";
     
            $resultados = $conexion->bd_conect->query($insercion);
        }

        return $cantidad;
    }

    public static function consultaResenas($conexion){
        $consulta = "";

        $consulta = "SELECT libro.titulo, libro.foto, resena.resena, resena.estrellas, resena.fecha_creacion FROM resena INNER JOIN libro ON resena.isbn = libro.isbn";

        $resultados = $conexion->bd_conect->query($consulta);

        $mensaje="";
        while($fila = $resultados->fetch_assoc()){
            $mensaje .=$fila['titulo'].";".$fila['foto'].";".$fila['resena'].";".$fila['estrellas'].";".$fila['fecha_creacion'].";";

        }

        return $mensaje;

    }

    public static function eliminarResena($conexion, $titulo){
        $consulta = "SELECT isbn FROM libro WHERE titulo = '$titulo'";
        $resultado = $conexion->bd_conect->query($consulta);
        $isbnBorrar ="";

        // Verificar si se encontró una resena con el título dado
    if ($resultado) {
        // Obtener el título de la resena

        $fila = $resultado->fetch_assoc();
        $isbnBorrar = $fila['isbn'];

        // Consultar para eliminar la resena
        $eliminar = "DELETE FROM resena WHERE isbn = '$isbnBorrar'";
        $resultados = $conexion->bd_conect->query($eliminar);

        // Verificar si la eliminación se realizó correctamente
        if($resultados) {
            return "Eliminado correctamente";
        } else {
            return $isbnBorrar;
        }
    } else {
        return $isbnBorrar;
    }

        $eliminar = "DELETE FROM resena WHERE isbn = '$isbn'";
        $resultados = $conexion->bd_conect->query($eliminar);
        if($resultados){
           return "Eliminado correctamente";
        }

        return "No se ha eliminado";

    }

    public static function modificarResena($conexion, $resena, $titulo){

        $consulta = "SELECT isbn FROM libro WHERE titulo = '$titulo'";
        $resultado = $conexion->bd_conect->query($consulta);

        $isbnMod ="";
        // Verificar si se encontró una resena con el título dado
    if ($resultado) {
        // Obtener el título de la resena

        $fila = $resultado->fetch_assoc();
        $isbnMod = $fila['isbn'];


        //Consulta para modificar la resena
        $update = "UPDATE resena SET resena = '$resena' WHERE isbn = '$isbnMod'";

        $resultados = $conexion->bd_conect->query($update);

        // Verificar si la modificación se realizó correctamente
        if($resultados) {
            return "Modificado correctamente";
        } else {
            return "No se ha podido modificar";
        }
    } else {
        return "No se ha podido modificar";
    }

        
        if($resultados){
           return "Modificado correctamente";
        }

        return "No se ha modificado";


    }

} 