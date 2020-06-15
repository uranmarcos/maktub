<?php
//DECLARACION DE VARIABLES A USAR
  $logueo="menu";

//TOMO NOMBRE PARA EL LOGUEO
  if(isset($_SESSION["name"])){
    $logueo = $_SESSION["name"];
  }
?>


<!DOCTYPE html>
<html>
  <head>
    <title>Maktub</title>
    <meta charset="utf-8">
    <link href="header.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Gruppo&family=Shadows+Into+Light+Two&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Shadows+Into+Light+Two&display=swap" rel="stylesheet">
  </head>
  <body>
    <div class="body-header">
      <nav class="barra-superior">
          <div class="barra-izq">
            <a class="logo" href="maktub2.php" class="maktub"></a>
          </div>
          <div class="barra-der">
            <button id="menu"><?php echo $logueo ?></button>
              <nav id="superior">
                <ul class="opciones-burguer">
                  <li><a class="opciones-menu" href="contacto.php">Contacto</a></li>
                  <li><a class="opciones-menu" href="estadisticas.php">Estadisticas</a></li>
                  <li><a class="opciones-menu" href="logout.php">Cerrar sesión</a></li>
                </ul>
              </nav>
          </div>
        </nav>
      </div>
  </body>
