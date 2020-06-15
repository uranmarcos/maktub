<?php
session_start();
require_once("pdo.php");

$redireccion="";

  if($_SESSION["usuarioLogueado"]== true){
    $redireccion = "maktub2.php";
  } else {
    $redireccion = "demo.php";
  }

 ?>

<!DOCTYPE html>
<html>
  <head>
    <title>maktub</title>
    <meta charset="utf-8">
    <link href="help.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Gruppo&family=Shadows+Into+Light+Two&display=swap" rel="stylesheet">
  </head>
  <body>
    <div class="body-ayuda">
      <div class="contenido-ayuda">
        <p class="como-jugar">¿Cómo jugar?</p>
        <p>
        1. En la pantalla te va a aparecer un valor (puede ser número, una palabra o simbolos).
        Tenés que pensar: ¿en qué secuencia o patrón el valor que figura en
        pantalla ocupa o representa el número de nivel en que estás? (en algunos niveles
        esta lógica puede variar un poco, pero... ¡la idea es hacerte pensar!)
        </p>
        <p>
        2. Una vez que lo descubras, pensá cuál sería el valor siguiente
        en dicha secuencia.
        </p>
        <p>
        3. Completás en el campo el valor que pensaste y <strong>¡LISTO!</strong>
        <br>
        Ej: en el primer nivel, a 1 le sigue 2. Si el valor en
        pantalla fuese "uno", deberias ingresar "dos".
        </p>
        <p>
        ¡La respuesta se debe ingresar sin tildes! Además, se distinguen
        mayúsculas, minúsculas y espacios.<br>
        Ahora sí, ¡a jugar!
        </p>
        <br>
        <p>
        ¿Necesitás una ayuda extra?
        Por si te perdés, debajo siempre te saldrá el número de
        nivel en el que te encontrás.
        </p>
      </div>
      <div class="boton">
        <a class="empezar" href=<?php echo $redireccion?>>¡Jugar!</a>
      </div>
    </div>
  </body>
</html>
