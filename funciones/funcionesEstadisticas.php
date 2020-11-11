<?php 

    
//funciones estadisticas

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
$correctas =[];
$incorrectas= [];
$porcentajes=[];
$rankingNivel=0;
//calculo de porcentaje respuestas correctas
//busco en BBD valores para calcular estadisticas del nivel del usuario
  $query = $baseDeDatos -> Prepare
    ("SELECT mail, correctas, incorrectas FROM usuarios");
  $query -> execute();
  $consultaBDD = $query -> fetchAll(PDO::FETCH_ASSOC);
//almaceno en las variables las cantidades de respuestas del nivel
  foreach ($consultaBDD as $posicion ) {
    $correctas[] = $posicion["correctas"];
    $incorrectas[] = $posicion["incorrectas"];
  }
  //Almaceno en un array los porcentajes del nivel
  for($i=0; $i <count($consultaBDD) ; $i++){
    if($incorrectas[$i] == 0){
      $porcentajes[$i] = 100;
    }elseif($correctas[$i]==0){
      $porcentajes[$i] = 0;
    }else {
      $porcentajes[$i] =round(($correctas[$i]*100)/($correctas[$i] + $incorrectas[$i]));
    }
  }
//Calculo el promedio de los porcentajes del nivel
$promedioNivel = round(array_sum($porcentajes)/count($porcentajes));
///ordeno ranking por nivel
$query = $baseDeDatos -> Prepare
  ("SELECT mail, nivel FROM usuarios ORDER BY nivel DESC, correctas DESC, incorrectas ASC, id DESC ");
$query -> execute();
$consultaRankingNivel = $query -> fetchAll(PDO::FETCH_ASSOC);
$rankingNivel = array_search($mail,array_column($consultaRankingNivel, "mail"));
//busco en BBD valores para calcular estadisticas del nivel del usuario
$query = $baseDeDatos -> Prepare
  ("SELECT mail,round((correctas*100)/(correctas + incorrectas)) FROM usuarios");
$query -> execute();
$consultaBDD = $query -> fetchAll(PDO::FETCH_ASSOC);
//almaceno en las variables las cantidades de respuestas del nivel

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
if($totalRespuestas == 0){
    $porcentajeCorrectas ="No respondiste aún";
}else{
    $porcentajeCorrectas = ($correctas *100/$totalRespuestas);
}

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










