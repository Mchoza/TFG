<?php
class modeloFrasesAleatorias{

public static function fraseAleatoria($conexion){
    $consulta = "SELECT COUNT(*) AS total FROM frasesliterarias";

    $tot = $conexion->bd_conect->query($consulta);

    // Obtener el número total de tuplas como un entero
    $total = $tot->fetch_assoc()['total'];

    //Generamos un numero aleatorio entre el 0 y el total de la consulta
    $numeroAleatorio = rand(1, $total);

    $consulta2 = "SELECT * FROM frasesliterarias WHERE id  = $numeroAleatorio";

    $resultados = $conexion->bd_conect->query($consulta2);
    
    $mensaje = "";
        while($fila = $resultados->fetch_assoc()){
            
            $mensaje = $fila['cita'].";".$fila['autor']." ;".$fila['libro'];
            }
        
        return $mensaje;
    }


    public static function anadirFraseAleatoria($conexion, $cita, $libro, $autor){
        $insercion = "INSERT INTO frasesliterarias (cita, autor, libro) VALUES ('$cita', '$autor', '$libro')";
        $resultados = $conexion->bd_conect->query($insercion);
        $mensaje = false;
        if($resultados){
            $mensaje = true;
        }
        return $mensaje;

    }

}