<?php
session_start();
require_once("pdo.php");
require_once("header.php");

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
     <link href="css/estadisticas2.css" rel="stylesheet">
     <link href="https://fonts.googleapis.com/css2?family=Gruppo&family=Shadows+Into+Light+Two&display=swap" rel="stylesheet">
     <link href="https://fonts.googleapis.com/css2?family=Shadows+Into+Light+Two&display=swap" rel="stylesheet">
   </head>
   <body>
      <div class="row justify-content-center">
        <div class="col-10 col-md-6 col-xl-4 main">
          <div class="estadisticas">
            <h2><?php echo $mensaje ?></h2>
          </div>
          <div class="row">
            <div class= "col-6 columna-izquierda">
              <div>
                <p>Tu promedio: </p>
              </div>
              <div>
                <p>Promedio general:</p>
              </div>
              <div>
                <p>Nivel:</p>
              </div>
              <div>
                <p>Puesto:</p>
              </div>
              <div>
                <p>Respondiste:</p>
              </div>
              <div>
                <p>Pifiaste</p>
              </div>
              <div>
                <p>Completado:</p>
              </div>
            </div>

            <div class= "col-6 columna-derecha">
              <div>
                <p><?php echo round($porcentajeCorrectas)?>%</p>
              </div>
              <div>
                <p><?php echo $promedioNivel?> %</p>
              </div>
              <div>
                <p><?php echo $nivel ?></p>
              </div>
              <div>
                <p><?php echo $rankingNivel?></p>
              </div>
              <div>
                <p><?php echo $correctas ?> <?php echo $vecesCorrectas?> bien! ;)</p>
              </div>
              <div>
                <p><?php echo $incorrectas ?> <?php echo $vecesIncorrectas?> </p>
              </div>
              <div>
                <p><?php echo round($porcentajeDeJuego) ?> % del juego.</p>
              </div>
            </div>
          </div>
          <div class="row justify-content-center">
            <div class="col-12">
              <div class="caja-porcentaje">
                <div class="porcentajeDeJuego" style="width:<?php echo round($porcentajeDeJuego)?>%">
                </div>
              </div>
              <a class="jugar" href="maktub0.php">Seguir Jugando</a>
            </div>
          </div>

        </div>
      </div>

     <script src="js/jquery-3.5.1.min.js"></script>
     <script src="js/popper.min.js"></script>
     <script src="js/bootstrap.min.js"></script>
   </body>
 </html>