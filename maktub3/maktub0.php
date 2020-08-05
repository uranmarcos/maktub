<?php
session_start();
require_once("respuestas.php");
require_once("pdo.php");
require_once("header.php");
require_once("validacionRespuestas.php");


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
    <link href="css/maktub1.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Gruppo&family=Shadows+Into+Light+Two&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Shadows+Into+Light+Two&display=swap" rel="stylesheet">
  </head>
  <body>
    <div class="row justify-content-center">
      <main class="col-12 col-md-6 col-xl-4">
        <div>
          <MARQUEE><?php echo $texto?></MARQUEE>
        </div>
        <div class="caja-valor">
          <h1><?php echo $valorAMostrar?></h1>
          <h2><?php echo $mensajeError ?></h2>
          <p class="<?php echo $nivel22?>">veinte mas dos</p>
        </div>
        <div class="respuesta">
            <form class="" action="maktub0.php" autocomplete="off" method="GET">
              <input class="campo-respuesta <?php echo $ocultar?>" type="text" name="respuesta" method="GET">
              <br>
              <input class="enviar" type= "<?php echo $botonEnviar ?>" name= " " value= "ENVIAR">
              <div class="<?php echo $probar?>">
                <a href="maktub0.php">Probar de nuevo</a>
              </div>
            </form>
        </div>
        <div class="nivel">
          <h3><?php echo $nivel ?></h3>
        </div>
      </main>
    </div>

    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

  </body>
</html>
