<?php
session_start();
  require_once("pdo.php");
  require_once("header.php");
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
    echo "<script>location.href='index.php?removido=true';</script>";
    exit;
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
    <link href="css/reiniciar1.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Gruppo&family=Shadows+Into+Light+Two&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Shadows+Into+Light+Two&display=swap" rel="stylesheet">
  </head>
  <body>
    <div class="row justify-content-center">
      <div class="col-10 col-md-6 col-xl-4 main">
       <h2>Estás seguro/a<br> de querer reiniciar el juego?</h2>
       <h2>Volverás al nivel 1 y tendrás que realizar nuevamente todos los niveles. Deberás loguearte nuevamente, y arrancarás de cero.</h2>
       <form name="" action="reiniciar.php" method="GET">
         <input class="boton-reiniciar" name="reinicio" type="submit" value="Reiniciar">
       </form>
       <a class="jugar" href="maktub0.php">Seguir Jugando</a>
     </div>
    </div>


    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

  </body>
</html>
