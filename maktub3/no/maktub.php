<?php
session_start();
require_once("respuestas.php");
require_once("pdo.php");
require_once("header.php");

if($_SESSION["usuarioLogueado"] == false){
  header("Location: index.php");
} else{
  $logueo = $_SESSION["name"];
  $mail = $_SESSION["mail"];
//Traigo el nivel desde base de datos
    $query = $baseDeDatos -> Prepare
      ("SELECT nivel FROM usuarios where mail = '$mail'");
    $query -> execute();
    $consultaBDD = $query -> fetch(PDO::FETCH_ASSOC);
}

//DECLARACION DE VARIABLES A USAR
$logueo="menu";
$mensajeError=NULL;
$variableError = 0;
$botonEnviar = "submit";
$botonProbarDeNuevo = "hidden";
$incorrectas = [];
$nivel = $consultaBDD["nivel"];
$resultado = $valor[$nivel];
$probar ="hidden";
$ocultar ="";
$checked ="";
$correctas="";
$posicionTexto = array_rand($textoEnMovimiento, 1);
$texto = $textoEnMovimiento[$posicionTexto];
//Valido respuestas
if($_GET){
//Si la respuesta es correcta
  if($_GET["respuesta"] == $valores[$nivel]){
    $nivel = $nivel+1;
    $resultado = $valor[$nivel];
    $correctas = $nivel-1;
    $checked ="checked";

    $consulta = $baseDeDatos-> prepare
    ("UPDATE usuarios SET nivel='$nivel', correctas = '$correctas'
    WHERE mail = '$mail'");
    $consulta->execute();
  }
//SI LA RESPUESTA ES INCORRECTA
  else {
    //almaceno las respuestas $incorrectas
        $mensajeAGuardar[] = [
                "mail" => $mail,
                "nivel" => $nivel,
                "mensaje"=>$_GET["respuesta"]
              ];
        $mensajeJson = json_encode($mensajeAGuardar);
        file_put_contents ("json/respuestas.json", $mensajeJson, FILE_APPEND);


          $variableError = array_rand($errores, 1);
          $resultado = NULL;
          $mensajeError = $errores[$variableError];
          $botonEnviar = "hidden";
          $probar= "probar";
          $nivel = NULL;
          $ocultar = "ocultar";
//traigo valor de incorrectas
      $consulta = $baseDeDatos-> prepare
      ("SELECT incorrectas FROM usuarios WHERE mail = '$mail'");
      $consulta->execute();
//le sumo uno al valor por esta respuesta incorrecta
      $incorrectas = $consulta->fetch(PDO::FETCH_ASSOC);
      $incorrectas["incorrectas"] = $incorrectas["incorrectas"]+1;
      $incorrectasFinal = ($incorrectas["incorrectas"]);
//mando nuevamente a BDD el valor actualizado
      $consulta2 = $baseDeDatos-> prepare
      ("UPDATE usuarios SET incorrectas = '$incorrectasFinal'
      WHERE mail = '$mail'");
      $consulta2->execute();
  }
}
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Maktub</title>
    <meta charset="utf-8">
    <link href="maktub.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Gruppo&family=Shadows+Into+Light+Two&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Shadows+Into+Light+Two&display=swap" rel="stylesheet">
  </head>
  <body>
    <div class="body-niveles">
      <div>
        <MARQUEE><?php echo $texto?></MARQUEE>
      </div>
      <main class="main-niveles">
          <div class="valor">
            <h1><?php echo $resultado ?></h1>
            <h3><?php echo $mensajeError ?></h3>
            <br>
          </div>
          <div class="respuesta">
            <form class="" action="maktub.php" autocomplete="off" method="GET">
              <input class="campo-respuesta <?php echo $ocultar?>" type="text" name="respuesta" method="GET">
              <br>
              <input class="enviar" type= "<?php echo $botonEnviar ?>" name= " " value= "ENVIAR">
              <div class="<?php echo $probar?>">
                <a href="maktub2.php">Probar de nuevo</a>
              </div>
            </form>
          </div>
          <div class="nivel">
            <div>
            </div>
            <div
              <h2><?php echo $nivel ?></h2>
          </div>
          <form>
            <div class="check">
              <input type="checkbox" <?php echo $checked?> value"1">
              <input type="checkbox" <?php echo $checked?>value"1">
              <input type="checkbox" <?php echo $checked?>value"1">
              <input type="checkbox" <?php echo $checked?>value"1">
              <input type="checkbox" <?php echo $checked?>value"1">
              <input type="checkbox" <?php echo $checked?>value"1">
              <input type="checkbox" <?php echo $checked?>value"1">
              <input type="checkbox" <?php echo $checked?>value"1">
              <input type="checkbox" value"1">
              <input type="checkbox" name="fieldName" value="Check Value" readonly="readonly" checked="off" checked onclick="javascript: return false;"/>
            </div>
            <div class="numeros">
              <p>1</p>
              <p>2</p>
              <p>3</p>
              <p>4</p>
              <p>5</p>
              <p>6</p>
              <p>7</p>
              <p>8</p>
              <p>9</p>
              <p>0</p>
            </div>
          </form>
      </main>
    </div>
  </body>
</html>
