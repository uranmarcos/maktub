<?php
//DECLARACION DE VARIABLES A USAR
  $logueo="menu";
  $administrador="none";
  $contacto = "#";
  $estadisticas = "#";
  $logOut = "#";
  $reiniciar = "#";
//TOMO NOMBRE PARA EL LOGUEO
  if(isset($_SESSION["name"])){
    $logueo = $_SESSION["name"];
    $contacto = "contacto.php";
    $estadisticas = "estadisticas.php";
    $logOut = "logout.php";
    $reiniciar = "reiniciar.php";
    $admin = "admin.php";
  }
  if($_SESSION["rol"] == "admin"){
    $administrador = "block";
  }
 
?>


<!DOCTYPE html>
<html>
  <head>
    <title>Maktub</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.8">
    <link href="https://fonts.googleapis.com/css2?family=Gruppo&family=Shadows+Into+Light+Two&display=swap" rel="stylesheet">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="css/header1.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Gruppo&family=Shadows+Into+Light+Two&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Shadows+Into+Light+Two&display=swap" rel="stylesheet">
  </head>
  <body>
      <div class="row justify-content-center">
        <div class="col-10 col-md-6 col-xl-4">
          <div class="row align-items-center head">
            <div class="col-6 caja-header-left">

            </div>
            <div class="col-6">
              <div class="row justify-content-end">
                <div class="col-auto">
                  <button id="menu"><?php echo $logueo ?></button>
                  <nav id="superior">
                    <ul class="opciones-burguer">
                        <li><a class="opciones-menu" href="<?php echo $contacto?>">Contacto</a></li>
                        <li><a class="opciones-menu" href="<?php echo $estadisticas?>">Estadisticas</a></li>
                        <li><a class="opciones-menu" href="<?php echo $logOut ?>">Cerrar sesión</a></li>
                        <li><a class="opciones-menu" href="<?php echo $reiniciar ?>">Reiniciar</a></li>
                        <li><a class="opciones-menu" href="<?php echo $admin ?>" style="display:<?php echo $administrador ?>">Admin</a></li>
                    </ul>
                  </nav>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
