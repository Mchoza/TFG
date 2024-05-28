<?php

class modeloUsuarios{

    public static function loginUsuarios($conexion, $emailLogin, $passwordLogin){
        $consulta = "SELECT * FROM usuario WHERE email  = '$emailLogin'";

        $resultados = $conexion->bd_conect->query($consulta);

        $accesoAut = false;

        $comprobar =0;//Para los que no tienen clave encriptada
        $comprobar1=0;//Para los que tienen clave encriptada
        $mensaje = "";
        if($resultados !== false && $resultados->num_rows > 0){
            while($fila = $resultados->fetch_assoc()){
                if((password_verify($passwordLogin, $fila['password']))){
                    $accesoAut=true;
                    $mensaje = "Acceso autorizado contrasena cifrada";

                    return $accesoAut;

                }else if($passwordLogin == $fila['password']){
                    $accesoAut = true;
                    $mensaje = "Acceso autorizado contrasena NO cifrada";
                    return $accesoAut;
                }
            }
            if(!$accesoAut){
                
                $mensaje = "Acceso denegado, la contrasena no es correcta";
            }
        }else{
            $mensaje = "No existe ningun usuario con email ".$emailLogin;

        }

        return $accesoAut;
    }

    public static function nomUsuario($conexion, $emailLogin){

        $consulta = "SELECT nomUsuario FROM usuario WHERE email  = '$emailLogin'";
        $resultado = $conexion->bd_conect->query($consulta);



        // Verificar si la consulta fue exitosa
        if ($resultado) {
            // Obtener la primera fila del resultado
            $fila = $resultado->fetch_assoc();
            
            // Verificar si se encontraron resultados
            if ($fila) {
                // Obtener el valor de la columna "nomUsuario"
                $nomUsuario = $fila['nomUsuario'];
                
                // Convertir a cadena si no lo es
                if (!is_string($nomUsuario)) {
                    $nomUsuario = strval($nomUsuario);
                }
                
                // Obtener la primera letra del valor de "nomUsuario"
                $primeraLetra = substr($nomUsuario, 0, 1);
                
                // Usar la primera letra como necesites
                return $primeraLetra;
            } else {
                echo "No se encontraron resultados para el email proporcionado.";
            }
        } else {
            echo "Error al ejecutar la consulta: " . $conexion->bd_conect->error;
        }




    }

    public static function registroUsuarios($conexion, $nomUsuario, $emailRegister, $passwordRegister){
        // Verificar si el correo electrónico ya está registrado
        $consulta_verificacion = "SELECT * FROM usuario WHERE email = '$emailRegister'";
        $resultado_verificacion = $conexion->bd_conect->query($consulta_verificacion);

        if ($resultado_verificacion->num_rows > 0) {
            // El correo electrónico ya está registrado
            return false; // Indicar que no se pudo registrar el usuario
        }

         $contrCifrada = password_hash($passwordRegister,PASSWORD_DEFAULT);
         $consulta = "INSERT INTO usuario (nomUsuario, email, password) VALUES ('$nomUsuario', '$emailRegister', '$contrCifrada')";

         $resultados = $conexion->bd_conect->query($consulta);
         $insertado = false;
         $mensaje = "";

         if($resultados){
             $insertado = true;
             $mensaje = "Insertado realizado con éxito";
            
         }

         return $insertado;


    }
    
}