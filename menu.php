<?php
session_start();
require_once("pdo.php");

if($_SESSION["usuarioLogueado"] == false){
    header("Location: index.php");
    } else{
        $logueo = $_SESSION["name"];
        $mail = $_SESSION["mail"];
        $rol = $_SESSION["rol"];
        
        if($rol == "admin"){
            $administrador = "block";
        }else{
            $administrador="none";
        }
}
$seccion = "secciones/perfil.php";

if($_POST){
    if(isset($_POST["estadisticas"])){
            $seccion ="secciones/estadisticas.php";
        } else if(isset($_POST["contacto"])){
            $seccion ="secciones/contacto.php";
        }else if(isset($_POST["perfil"])){
            $seccion ="secciones/perfil.php";
        }else if(isset($_POST["cerrar"])){
            $seccion ="secciones/logOut.php";
        }else if(isset($_POST["reiniciar"])){
            $seccion ="secciones/reiniciar.php";
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
        <link href="css/menu.css" rel="stylesheet">
        <link href="css/header2.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Spartan:wght@300&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Gruppo&display=swap" rel="stylesheet">
    </head>
    <body>
        <div class="contenedor col-10 col-xl-5"> 
                <div class="row justify-content-center">
                    <?php include("header.php");?>
                </div>    
                <main class="row justify-content-center">
                        <?php include($seccion)?>
                </main>
        </div>    


        <script src="js/jquery-3.5.1.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/maktub5.js"></script>

    </body>
</html>   