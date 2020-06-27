<?php
session_start();
include("pdo.php");
$zIndexRegistro = 0;
$zIndexLogin = 0;
//variables register//
$name= "";
$mail = "";
$password = "";
$error="";
$errorName = "";
$errorMail = "";
$errorMailExistente = "";
$errorPassword="";
$errorPasswordConfirmacion = "";
$usuarios = [];
//variables login//


if(isset($_GET["boton-register"])){
  $zIndexRegistro=2;
}
if(isset($_GET["boton-login"])){
  $zIndexLogin = 2;
}

if(isset($_POST["name-register"])){
  $zIndexRegistro = 2;
  require("validacionRegister.php");
}
if(isset($_POST["mailLogin"])){
  $zIndexLogin = 2;
  require("validacionLogin.php");
}
?>

<!DOCTYPE html>
<html>
  <head>
    <title>maktub</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Gruppo&family=Shadows+Into+Light+Two&display=swap" rel="stylesheet">
    <link href="css/index1.css" rel="stylesheet">
  </head>
  <body>
    <!-- header index -->
    <header class="row justify-content-center">
      <div class="col-10 col-md-6 col-xl-4 header">
      </div>
    </header>


    <main class="row justify-content-center">
      <div class="col-10 col-md-6 col-xl-4">
          <!--  titulo -->
          <div class"row">
            <h1>Juego de lógica</h1>
          </div>

          <!-- caja botones login y registro  -->
          <div class="row">
            <form class="col-12" action="index.php" method="GET">
              <div class="row">
                <input class="col-6 boton" type="submit" name="boton-register"
                value="Registro">
                <input class="col-6 boton" type="submit" name="boton-login"
                value="Ingresar">
              </div>
            </form>
          </div>

          <!-- caja formularios  -->
          <div class="row">
            <div class="col-12 formulario">
              <div style="z-index:1" class="caja-principal">
                <div class="formulario">
                  <h4>Un valor por nivel ¿En qué secuencia o con qué patrón dicho valor representa el nivel? ¡Una vez que lo descubrás, avanzas!
                  </h4>
                </div>
              </div>
              <div style="z-index:<?php echo $zIndexRegistro?>" class="caja-principal">
                <div class="formulario">
                  <form class="formulario-interior" action="index.php" method="POST">
                    <p class="campos">Nombre o apodo:
                      <input class="campoACompletar" type="text" name="name-register" placeholder="Entre 3 y 8 caracteres" value="<?php $nombre ?>">
                      <p class="error">
                        <?php echo $errorName ?>
                      </p>
                    </p>
                    <p class="campos">Mail:
                      <br>
                      <input class="campoACompletar" type="text" name="mail-register" value="<?php $mail ?>">
                      <p class="error">
                        <?php echo $errorMail ?>
                        <?php echo $errorMailExistente ?>
                      </p>
                    </p>
                    <p class="campos">Contraseña:
                      <input class="campoACompletar" type="password" placeholder="Entre 4 y 8 caracteres" name="pass-register" value"<?php $password ?>">
                      <p class="error">
                        <?php echo $errorPassword ?>
                      </p>
                    </p>
                    <p class="campos">Repetir Contraseña:
                      <input class="campoACompletar" type="password" name="passconf-register" value"<?php $passwordConfirmacion ?>">
                      <p class="error">
                        <?php echo $errorPasswordConfirmacion ?>
                      </p>
                    </p>
                    <div>
                      <input class="boton-enviar" type="submit" name="" value="Registrarme">
                    </div>
                  </form>
                </div>
              </div>
              <div style="z-index:<?php echo $zIndexLogin?>" class="caja-principal">
                <div class="formulario">
                  <form class="formulario-interior" action="index.php" method="POST">
                    <p class="campos">Mail:
                      <div>
                        <input class="campoACompletar" type="text" name="mailLogin" value="<?php $mail ?>">
                      </div>
                    </p>
                    <p class="campos">Contraseña:
                      <div>
                        <input class="campoACompletar" type="password" name="pass-login" value"<?php $password ?>">
                      </div>
                    </p>
                    <div class="recuperarPass">
                      <a href="recuperarPass.php">Olvidé mi contraseña</a>
                    </div>
                    <p class="error">
                      <?php echo $error ?>
                    </p>
                    <div>
                      <input class="boton-enviar" type="submit" name="" value="Ingresar">
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>

      </div>
    </main>




    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
