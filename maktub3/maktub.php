<?php
session_start();
require_once("respuestas.php");
require_once("pdo.php");
require_once("validacionRespuestas.php");

$seccion ="secciones/help.php";

/* variables para header*/
//DECLARACION DE VARIABLES A USAR
$logueo="menu";
$administrador="none";
$contacto = "#";
$estadisticas = "#";
$logOut = "#";
$reiniciar = "#";
//TOMO NOMBRE PARA EL LOGUEO
if(isset($_SESSION["name"])){
  $logueo = $_SESSION["name"];
  $contacto = "contacto.php";
  $estadisticas = "estadisticas.php";
  $logOut = "logout.php";
  $reiniciar = "reiniciar.php";
  $admin = "admin.php";
}
if($_SESSION["rol"] == "admin"){
  $administrador = "block";
}
if($_POST){
    if(isset($_POST["jugar"])){
        $seccion = "secciones/niveles.php";
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Maktub</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.8">
        <link href="https://fonts.googleapis.com/css2?family=Gruppo&family=Shadows+Into+Light+Two&display=swap" rel="stylesheet">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link href="css/maktub.css" rel="stylesheet">
        <link href="css/header1.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Spartan:wght@300&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Gruppo&display=swap" rel="stylesheet">
    </head>
    <body>
        <div class="header">
            <?php include("header.php");?>
        </div>    
        <div class="row justify-content-center">
            <main class="col-12 col-md-6 col-xl-4">
                <?php include($seccion)?>
            </main>
        </div>

    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    </body>
</html>    