<?php
session_start();
require_once("pdo.php");
require_once("calculoEstadisticas.php");
require_once("header.php");

  $mail = $_SESSION["mail"];
  $nivel = "";
  $correctas ="";
  $incorrectas= "";
  $totalRespuestas="";
  $porcentajeCorrectas="";
  $mensaje="";
  $vecesCorrectas="veces";
  $vecesIncorrectas="veces";
  $porcentajeDeJuego="";
//busco en BBD valores para calcular estadisticas
  $query = $baseDeDatos -> Prepare
    ("SELECT nivel, correctas, incorrectas FROM usuarios where mail = '$mail'");
  $query -> execute();
  $consultaBDD = $query -> fetch(PDO::FETCH_ASSOC);

//asigno los valores a variables
  $nivel = $consultaBDD["nivel"];
  $porcentajeDeJuego = $nivel*100/30;
  $correctas = $consultaBDD["correctas"];
  $incorrectas = $consultaBDD["incorrectas"];

//texto según nivel alcanzado
if($correctas==1){
  $vecesCorrectas="vez";
}
if($incorrectas==1){
    $vecesIncorrectas="vez";
}
//calculo estadísticas
  $totalRespuestas = ($correctas + $incorrectas);
  $porcentajeCorrectas = ($correctas *100/$totalRespuestas);

  if($porcentajeCorrectas == 100){
    $mensaje = "¡¡¡EXCELENTE!!!<br>¡Nos sacamos el sombrero!";
  } elseif (($porcentajeCorrectas>=80) && ($porcentajeCorrectas<100)){
    $mensaje = "¡BRAVO!<br>¡Seguí así!!!";
  } elseif (($porcentajeCorrectas>=60)&&($porcentajeCorrectas<80)) {
    $mensaje = "¡Venis muy bien!<br>¡Felicitaciones!";
  } elseif (($porcentajeCorrectas>=50) && ($porcentajeCorrectas<60)) {
        $mensaje = "Mmm, raspando...<br>¡Pero estás a tiempo de repuntar!";
  } else{
        $mensaje = "Eh... ¿estás seguro/a<br>que querés el resultado?";
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
     <link href="css/estadisticas1.css" rel="stylesheet">
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
            <div class= "col-8 columna-izquierda">
              <div>
                <p>Respuestas correctas: </p>
              </div>
              <div>
                <p>Promedio general:</p>
              </div>
              <div>
                <p>Estás en el nivel:</p>
              </div>
              <div>
                <p>Puesto (por nivel alcanzado):</p>
              </div>
              <div>
                <p>Respondiste:</p>
              </div>
              <div>
                <p>Pifiaste</p>
              </div>
              <div>
                <p>Has completado el:</p>
              </div>
            </div>

            <div class= "col-4 columna-derecha">
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
            <div class="col-auto">
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
