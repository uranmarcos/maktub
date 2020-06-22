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
  require("validacionRegister.php");
}
if(isset($_GET["boton-login"])){
  $zIndexLogin = 2;
  require("validacionLogin.php");
  }
if(isset($_POST["register"])){
  $zIndexRegistro = 2;
}
?>


<!DOCTYPE html>
<html>
  <head>
    <title>maktub</title>
    <meta charset="utf-8">
    <link href="index4.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Gruppo&family=Shadows+Into+Light+Two&display=swap" rel="stylesheet">
  </head>
  <body class="body-index">
    <header class="header-index">
    </header>
    <main>
      <h1>Juego de lógica</h1>
      <form action="index3.php" method="GET">
        <div class="caja-botones">
          <input class="boton" type="submit" name="boton-register"
           value="Registro">
          <input class="boton" type="submit" name="boton-login"
          value="Ingresar">
        </div>
      </form>
      <div class="formulario">
        <div style="z-index:1" class="caja-principal">
          <div class="formulario">
            <h4>Un valor por nivel ¿En qué secuencia o con qué patrón dicho valor representa el nivel? ¡Una vez que lo descubrás, avanzas!
            </h4>
          </div>
        </div>
        <div style="z-index:<?php echo $zIndexRegistro?>" class="caja-principal">
          <div class="formulario">
            <form class="formulario-interior" name="register" action="index3.php" method="POST">
              <p class="campos">Nombre o apodo:
                <input class="campoACompletar" type="text" name="name" placeholder="Entre 3 y 8 caracteres" value="<?php $nombre ?>">
                <p class="error">
                  <?php echo $errorName ?>
                </p>
              </p>
              <p class="campos">Mail:
                <br>
                <input class="campoACompletar" type="text" name="mail" value="<?php $mail ?>">
                <p class="error">
                  <?php echo $errorMail ?>
                  <?php echo $errorMailExistente ?>
                </p>
              </p>
              <p class="campos">Contraseña:
                <input class="campoACompletar" type="password" placeholder="Entre 4 y 8 caracteres" name="pass" value"<?php $password ?>">
                <p class="error">
                  <?php echo $errorPassword ?>
                </p>
              </p>
              <p class="campos">Repetir Contraseña:
                <input class="campoACompletar" type="password" name="passconf" value"<?php $passwordConfirmacion ?>">
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
            <form class="formulario-interior" name"form-login" action="index3.php" method="POST">
              <p class="campos">Mail:
                <div>
                  <input class="campoACompletar" type="text" name="mail" value="<?php $mail ?>">
                </div>
              </p>
              <p class="campos">Contraseña:
                <div>
                  <input class="campoACompletar" type="password" name="pass" value"<?php $password ?>">
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
    </main>
  </body>
</html>
