<?php
//DECLARACION DE VARIABLES A USAR
  $logueo="menu";

//TOMO NOMBRE PARA EL LOGUEO
  if(isset($_SESSION["name"])){
    $logueo = $_SESSION["name"];
    $contacto = "contacto.php";
    $estadisticas = "estadisticas.php";
    $logOut = "logout.php";
    $reiniciar = "reiniciar.php";
  } else {
    $contacto = "#";
    $estadisticas = "#";
    $logOut = "#";
    $reiniciar = "#";
  }
?>


<!DOCTYPE html>
<html>
  <head>
    <title>Maktub</title>
    <meta charset="utf-8">
    <link href="header2.css" rel="stylesheet">
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
                  <li><a class="opciones-menu" href="<?php echo $contacto?>">Contacto</a></li>
                  <li><a class="opciones-menu" href="<?php echo $estadisticas?>">Estadisticas</a></li>
                  <li><a class="opciones-menu" href="<?php echo $logOut ?>">Cerrar sesión</a></li>
                  <li><a class="opciones-menu" href="<?php echo $reiniciar ?>">Reiniciar</a></li>
                </ul>
              </nav>
          </div>
        </nav>
      </div>
  </body>
