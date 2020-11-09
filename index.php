<?php
session_start();
include("pdo.php");

//declaración de variables a usar //
$name= "";
$mail = "";
$password = "";
$error="";
$usuarios = [];
$resultadoVerificacion=[];
$seccion = "secciones/mensajeInicio.php";

//archivos a llamar en base a eleccion del usuario
if($_GET){
    if(isset($_GET["botonRegister"])){
      $seccion = "secciones/register.php";
    }
    if(isset($_GET["botonLogin"])){
      $seccion = "secciones/login.php";
    }
}
if($_POST){
    if(isset($_POST["RecuperarPass"])){
      $seccion = "secciones/recuperarPass.php";
    }
    if(isset($_POST["Recuperar"])){
        $seccion = "secciones/recuperarPass.php";
        $name = $_POST["name"];
        $mail = $_POST["mail"];
        $password = $_POST["pass"];
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $passwordConfirmacion = $_POST["passconf"];
        include("funciones/funcionesIndex.php");
        $error = recuperarPassword($name, $mail, $password, $passwordConfirmacion, $hash, $baseDeDatos);
    }
    if(isset($_POST["Register"])){
        $seccion = "secciones/register.php";
        $name = $_POST["name"];
        $mail = $_POST["mail"];
        $password = $_POST["pass"];
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $passwordConfirmacion = $_POST["passConfirm"];
        include("funciones/funcionesIndex.php");
        $error = register($mail, $name, $hash, $baseDeDatos);
    }
    if(isset($_POST["Login"])){
        $seccion = "secciones/login.php";
        $mail = $_POST["mail"];
        $password = $_POST["pass"];
        $hash = password_hash($password, PASSWORD_DEFAULT);
        include("funciones/funcionesIndex.php");
        $error = login($mail, $password, $baseDeDatos);
    }
} 
?>

<!DOCTYPE html>
<html>
    <head>
      <title>Maktub</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.8">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <link rel="stylesheet"     href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
      <link href="https://fonts.googleapis.com/css2?family=Gruppo&family=Shadows+Into+Light+Two&display=swap" rel="stylesheet">
      <link href="css/index.css" rel="stylesheet">
    </head>
    <body>
        <!-- header index -->
        <header class="row justify-content-center">
            <div class="col-10 col-md-6 col-xl-4 header animate__animated animate__backInLeft">
            </div>
        </header>

        <!-- MAIN  -->
        <main class="row justify-content-center">
            <div class="col-10 col-md-6 col-xl-4">
                <!-- caja botones login y registro  -->
                <div class="row">
                    <form class="col-12" action="index.php" method="GET">
                        <div class="row">
                            <input class="col-6 boton" type="submit" name="botonRegister" value="Registro">
                            <input class="col-6 boton" type="submit" name="botonLogin" value="Ingreso">
                        </div>
                    </form>
                </div>
                <!-- caja contenedora  -->
                <div class="row">
                    <div class="col-12 cajaCompartida">
                          <?php include($seccion)?>
                    </div>
                </div>
            </div>
        </main>
        <script src="js/jquery-3.5.1.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/index.js"></script>
    </body>
</html>
