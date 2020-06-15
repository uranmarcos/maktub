<?php
  session_start();
  require_once("pdo.php");
  include_once("header.php");

  $mail = $_SESSION["mail"];
  $nivel = "";
  $correctas ="";
  $incorrectas= "";
  $totalRespuestas="";
  $porcentajeCorrectas="";
  $mensaje="";

//busco en BBD valores para calcular estadisticas
  $query = $baseDeDatos -> Prepare
    ("SELECT nivel, correctas, incorrectas FROM usuarios where mail = '$mail'");
  $query -> execute();
  $consultaBDD = $query -> fetch(PDO::FETCH_ASSOC);

//asigno los valores a variables
  $nivel = $consultaBDD["nivel"];
  $correctas = $consultaBDD["correctas"];
  $incorrectas = $consultaBDD["incorrectas"];

//calculo estadísticas
  $totalRespuestas = ($correctas + $incorrectas);
  $porcentajeCorrectas = ($correctas *100/$totalRespuestas);

  if($porcentajeCorrectas == 100){
    $mensaje = "¡¡¡EXCELENTE!!!<br>¡Nos sacamos el sombrero! No has fallado ni una vez";
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
     <link href="estadisticas.css" rel="stylesheet">
     <link href="https://fonts.googleapis.com/css2?family=Gruppo&family=Shadows+Into+Light+Two&display=swap" rel="stylesheet">
     <link href="https://fonts.googleapis.com/css2?family=Shadows+Into+Light+Two&display=swap" rel="stylesheet">
   </head>
   <body class="body-contacto">
     <main class="main-contacto">
        <h1><?php echo $mensaje ?> </h1>
        <h1 class="porcentaje"><?php echo round($porcentajeCorrectas) ?>% </h1>
        <h2>de respuestas correctas.</h2>
        <h3>Estás en el nivel: <?php echo $nivel ?> </h3>
        <h3>Has respondido: <?php echo $correctas ?> vez/veces bien! ;) </h3>
        <h3>Y le has pifiado <?php echo $incorrectas ?> vez/veces. </h3>
        <a  class="jugar" href="maktub2.php">Seguir Jugando</a>
     </main>
   </body>
 </html>
