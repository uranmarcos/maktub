<?php
session_start();
require_once("pdo.php");
include_once("header.php");
//declaro las variables a utilizar
  $mail = $_SESSION["mail"];
  $nivel = $_SESSION["nivel"];
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
echo "resultados";
var_dump($consultaBDD);













/*
//calculo de porcentaje respuestas correctas
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
*/
