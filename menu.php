<?php
session_start();
require_once("pdo.php");
require("funciones/funciones.php");

$seccion = "secciones/perfil.php";



if($_POST){
    //opciones menu
    if(isset($_POST["opcionEstadisticas"])){
            $seccion ="secciones/estadisticas.php";
            include("funciones/funcionesEstadisticas.php");
        } else if(isset($_POST["opcionContacto"])){
            $seccion ="secciones/contacto.php";
        }else if(isset($_POST["opcionPerfil"])){
            $seccion ="secciones/perfil.php";
        }else if(isset($_POST["opcionCerrar"])){
            $seccion ="secciones/logOut.php";
        }else if(isset($_POST["opcionReiniciar"])){
            $seccion ="secciones/reiniciar.php";
        }
        
    // acciones formulario
        else if(isset($_POST["seguirJugando"])){
            echo "<script>location.href='maktub.php';</script>";
        }
        else if (isset($_POST["reiniciar"])){
            reiniciar($nivel, $correctas, $incorrectas,$mail, $baseDeDatos);
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
        <link href="css/menu1.css" rel="stylesheet">
        <link href="css/header5.css" rel="stylesheet">
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
        <script src="js/maktub6.js"></script>
        <script src="js/form1.js"></script>

    </body>
</html>   