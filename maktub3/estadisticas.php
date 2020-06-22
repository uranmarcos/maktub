<?php
require_once("pdo.php");
  require_once("calculoEstadisticas.php");
  include_once("header.php");

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
     <link href="estadisticas2.css" rel="stylesheet">
     <link href="https://fonts.googleapis.com/css2?family=Gruppo&family=Shadows+Into+Light+Two&display=swap" rel="stylesheet">
     <link href="https://fonts.googleapis.com/css2?family=Shadows+Into+Light+Two&display=swap" rel="stylesheet">
   </head>
   <body>
     <main class="main-contacto">
        <div class="estadisticas">
          <h2><?php echo $mensaje ?></h2>
        </div>
        <div class="estadisticas">
          <h1 class="porcentaje"><?php echo round($porcentajeCorrectas) ?></h1>
          <h2> % de respuestas correctas.</h2>
        </div>
        <div class="estadisticas">
          <p>El promedio entre todos los jugadores es: <?php echo $promedioNivel?> %</p>
        </div>
        <div class="estadisticas">
          <p>Estás en el nivel: <?php echo $nivel ?> <p>
        </div>
        <div class="estadisticas">
          <p>Puesto (por nivel alcanzado): <?php echo $rankingNivel?> <p>
        </div>
        <div class="estadisticas column">
          Ya has completado el <?php echo round($porcentajeDeJuego) ?> % del juego.
          <div class="caja-porcentaje">
            <div class="porcentajeDeJuego" style="width:<?php echo round($porcentajeDeJuego)?>%">
            </div>
          </div>
        </div>
        <div class="estadisticas">
          <p>Has respondido: <?php echo $correctas ?> <?php echo $vecesCorrectas?> bien! ;) </p>
        </div>
        <div class="estadisticas">
          <p>Y le has pifiado <?php echo $incorrectas ?> <?php echo $vecesIncorrectas?> </p>
        </div>
        <a  class="jugar" href="maktub2.php">Seguir Jugando</a>
     </main>
   </body>
 </html>
