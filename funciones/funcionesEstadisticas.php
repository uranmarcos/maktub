<?php 
function consultarABaseDeDatos($mail, $baseDeDatos){
    $query = $baseDeDatos -> Prepare ("SELECT nivel, correctas, incorrectas FROM usuarios where mail = '$mail'");
    $query -> execute();
    $consultaBDD = $query -> fetch(PDO::FETCH_ASSOC);
    return $consultaBDD;
}
function calcularPorcentajeDeJuego($nivel){
    $porcentajeDeJuego = $nivel*100/30;
    return $porcentajeDeJuego;
}
function consultarCorrectas($consultaBDD){
    $correctas = $consultaBDD["correctas"];
    return $correctas;
}
function consultarIncorrectas($consultaBDD){
  $incorrectas = $consultaBDD["incorrectas"];
  return $incorrectas;
}
function calcularPorcentajeDeCorrectas($correctas, $incorrectas){
    if(($correctas + $incorrectas) == 0){
          $porcentajeCorrectas ="No respondiste aún";
          return $porcentajeCorrectas;
    }else{
          $porcentajeCorrectas = ($correctas * 100) /($correctas + $incorrectas);
          return $porcentajeCorrectas;
    }
}
function mostrarMensaje($porcentajeCorrectas){
    if($porcentajeCorrectas == 100){
        $mensaje = "¡¡¡EXCELENTE!!!<br>¡Nos sacamos el sombrero!";
        return $mensaje;
    }elseif (($porcentajeCorrectas>=80) && ($porcentajeCorrectas<100)){
        $mensaje = "¡BRAVO!<br>¡Seguí así!!!";
        return $mensaje;
    }elseif (($porcentajeCorrectas>=60)&&($porcentajeCorrectas<80)) {
        $mensaje = "¡Venis muy bien!<br>¡Felicitaciones!";
        return $mensaje;
    }elseif (($porcentajeCorrectas>=50) && ($porcentajeCorrectas<60)) {
        $mensaje = "Mmm, raspando...<br>¡Pero estás a tiempo de repuntar!";
        return $mensaje;
    }else{
        $mensaje = "Eh... ¿estás seguro/a<br>que querés el resultado?";
        return $mensaje;
    }
}
function consultarRanking($baseDeDatos, $mail){
    $query = $baseDeDatos -> Prepare ("SELECT mail, nivel FROM usuarios ORDER BY nivel DESC, correctas DESC, incorrectas ASC, id DESC ");
    $query -> execute();
    $consultaRankingNivel = $query -> fetchAll(PDO::FETCH_ASSOC);
    $rankingNivel = array_search($mail,array_column($consultaRankingNivel, "mail"));
    return $rankingNivel;
}
function calcularPromedioGeneral($baseDeDatos){
    $query = $baseDeDatos -> Prepare ("SELECT mail, correctas, incorrectas FROM usuarios");
    $query -> execute();
    $consultaBDD = $query -> fetchAll(PDO::FETCH_ASSOC);
    foreach ($consultaBDD as $posicion ) {
        $correctas[] = $posicion["correctas"];
        $incorrectas[] = $posicion["incorrectas"];
    }
    for($i=0; $i <count($consultaBDD) ; $i++){
        if($incorrectas[$i] == 0){
            $porcentajes[$i] = 100;
        }elseif($correctas[$i]==0){
            $porcentajes[$i] = 0;
        }else {
            $porcentajes[$i] =round(($correctas[$i]*100)/($correctas[$i] + $incorrectas[$i]));
        }
    }
    $sumatoria = 0;
    for($i = 0; $i < count($porcentajes); $i++){
      $sumatoria = $sumatoria + $porcentajes[$i];
    }
    $promedio = round($sumatoria / count($porcentajes));
    return $promedio;
}

