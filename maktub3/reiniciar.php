<?php
session_start();
  require_once("pdo.php");
  include_once("header.php");
  $mail = $_SESSION["mail"];
  $nivel ="";
  $correctas = "";
  $incorrectas = "";

  if(isset($_GET["reinicio"])){
    $nivel = 1;
    $correctas = 0;
    $incorrectas = 0;
    $consulta = $baseDeDatos-> prepare
    ("UPDATE usuarios SET nivel='$nivel', correctas='$correctas',
    incorrectas='$incorrectas' WHERE mail='$mail'");
    $consulta->execute();
    header("Location: maktub2.php");
    exit;
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Maktub</title>
    <meta charset="utf-8">
    <link href="reiniciar2.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Gruppo&family=Shadows+Into+Light+Two&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Shadows+Into+Light+Two&display=swap" rel="stylesheet">
  </head>
  <body>
    <main class="main-contacto">
       <h2>Estás seguro/a<br> de querer reiniciar el juego?</h2>
       <h2>Volverás al nivel 1 y tendrás que realizar nuevamente todos los niveles</h2>
       <form name="" method="GET">
         <input class="boton-reiniciar" name="reinicio" type="submit" value="Reiniciar">
       </form>
      <a  class="jugar" href="maktub2.php">Seguir Jugando</a>
    </main>
  </body>
</html>
