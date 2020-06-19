<?php
require_once("pdo.php");
include_once("header.php");
//declaro las variables a utilizar
  $mail = $_SESSION["mail"];
  $nivel = $_SESSION["nivel"];
  $correctas =[];
  $incorrectas= [];
  $porcentajes=[];
//busco en BBD valores para calcular estadisticas del nivel del usuario
  $query = $baseDeDatos -> Prepare
      ("SELECT correctas, incorrectas FROM usuarios where nivel = '$nivel'");
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
      $porcentajes[$i] = round(($correctas[$i]*100)/($correctas[$i] + $incorrectas[$i]));
  }
}
//Calculo el promedio de los porcentajes del nivel
  $promedioNivel = array_sum($porcentajes)/count($porcentajes);
