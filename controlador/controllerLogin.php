<?php
session_start();
//Conexion
require_once("../modelo/model.php");

//Modelos
require_once("../modelo/modeloUsuarios.php");

$conexion = new Conexion();

//Aqui evaluamos si es un login
if(isset($_POST['login'])){
    $emailLogin = $_REQUEST['emailLogin'];
    $passwordLogin = $_REQUEST['passwordLogin'];

    $loginCorrecto = modeloUsuarios::loginUsuarios($conexion,$emailLogin,$passwordLogin);

     if($loginCorrecto){

        $letraNom = modeloUsuarios::nomUsuario($conexion, $emailLogin);

        $_SESSION['usuario'] = $letraNom;

      
        var_dump($_SESSION['usuario']);

          header("Location: ../vista/paginaPrincipal.html");


     }else{
        $mensajeError = "Contrasena o usuario incorrecto";
        header("Location: ../vista/loginRegistro.html?mensajeErrorLogin=" . urlencode($mensajeError));

     }

}

//Evaluamos si es un registro
if(isset($_POST['register'])){
    $nomUsuario = $_REQUEST["nomUsuario"];
    $emailRegister = $_REQUEST['emailRegister'];
    $passwordRegister = $_REQUEST['passwordRegister'];

    $registroCorrecto = modeloUsuarios::registroUsuarios($conexion,$nomUsuario, $emailRegister,$passwordRegister);

    if($registroCorrecto){
            header("Location: ../index.php");

    }else{
        $mensajeError = "Error en el registro";
        header("Location: ../vista/loginRegistro.html?mensajeErrorRegistro=" . urlencode($mensajeError));
    }

}


// Verificar si la sesión está iniciada y devolver el valor de la sesión si existe
if (isset($_SESSION['usuario'])) {
    $usuario = $_SESSION['usuario'];
    echo $usuario;
 }
?>