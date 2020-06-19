<?php
session_start();
include("pdo.php");
$zIndexRegistro = 1;
$zIndexLogin = 0;
if($_GET){
  if(isset($_GET["register"])){
      $zIndexRegistro=1;
  }else{
    $zIndexRegistro=0;
  }
}
/*registeeeeeeeerrrr*/
$name= "";
$mail = "";
$password = "";
$errorName = "";
$errorMail = "";
$errorMailExistente = "";
$mensajeRegistrado=NULL;
$errorPassword="";
$errorPasswordConfirmacion = "";
$usuarios = [];
//tomo los datos de los campos del formulario y los cargo en variables
if ($_POST){
  $name = $_POST["name"];
  $mail = $_POST["mail"];
  $password = $_POST["pass"];
  $hash = password_hash($password, PASSWORD_DEFAULT);
  $passwordConfirmacion = $_POST["passconf"];
}
//errores campos formulario
if ($_POST){
  if((strlen($name)<3) || (strlen($name>8))){
    $errorName = "El nombre debe tener entre 3 y 8 caracteres";
  }
  if(filter_var($mail, FILTER_VALIDATE_EMAIL) == false){
    $errorMail = "El mail no tiene el formato correcto";
  }
  if ((strlen($password)<4) || (strlen($password)>8)){
    $errorPassword = "La contraseña debe poseer entre 4 y 8 caracteres";
  }
//valido mail
  $consultaMail = $baseDeDatos ->prepare ("SELECT mail FROM usuarios");
  $consultaMail -> execute();
  $usuarios = $consultaMail->fetchAll(PDO::FETCH_ASSOC);
  foreach ($usuarios as $usuario){
    if(mb_strtolower($usuario["mail"])=== mb_strtolower($mail)){
    $errorMailExistente = "El mail ingresado ya está registrado";
    }
  }
  if($password != $passwordConfirmacion){
    $errorPasswordConfirmacion = "Las contraseñas ingresadas no coinciden";
  }
}
//Si datos válidos, almaceno en BDD
if($_POST){
  if(
    (strlen($name)>=3) &&(strlen($name)<=8) &&
    (filter_var($mail, FILTER_VALIDATE_EMAIL) == true) &&
    (strlen($password)>=4)  && (strlen($password)<=8)&&
    ($password === $passwordConfirmacion) &&
    ($errorMailExistente != "El mail ingresado ya está registrado")) {
      $consulta =  $baseDeDatos -> prepare
      ("INSERT INTO usuarios(mail, name, password, nivel, correctas, incorrectas) VALUES ('$mail', '$name', '$hash', '1', '0', '0')");
      $consulta -> execute();
      $mensajeRegistrado = "Ya estás registrado. ¡Ingresá para comenzar a jugar!";
      echo "<script>location.href='index.php?removido=true';</script>";
      exit;
  }
}
if($_GET){
  if(isset($_GET["login"])){
      $zIndexLogin = 1;
  } else{
      $zIndexLogin = 0;
  }
}
/*    LOGIIINNNNN     */
//DECLARO VARIABLES A USAR
$mail = "";
$password = "";
$error = "";
$resultadoVerificacion=[];
//ALMACENO EN VARIABLES LOS DATOS INGRESADOS EN EL FORMULARIO
if($_POST){
  $mail = $_POST["mail"];
  $password = $_POST["pass"];
}
//VALIDO LOS DATOS INGRESADOS CON BDD, Y ALMACENO EN SESSION
if ($_POST){
    $consulta = $baseDeDatos ->prepare("SELECT * FROM usuarios");
    $consulta->execute();
    $datosUsuarios =$consulta -> fetchAll(PDO::FETCH_ASSOC);
    foreach ($datosUsuarios as $datoUsuario) {
      $resultadoVerificacion = password_verify($password, $datoUsuario["password"]);
      if((mb_strtolower($mail) === mb_strtolower($datoUsuario["mail"])) && ($resultadoVerificacion == true)){
        $_SESSION["usuarioLogueado"]=true;
        $_SESSION["name"] = $datoUsuario["name"];
        $_SESSION["nivel"] = $datoUsuario["nivel"];
        $_SESSION["mail"] = $datoUsuario["mail"];
        $_SESSION["nivel"] = $datoUsuario["nivel"];
        $_SESSION["correctas"] = $datoUsuario["correctas"];
        $_SESSION["incorrectas"] = $datoUsuario["incorrectas"];
        echo "<script>location.href='help.php?removido=true';</script>";
        } else {
          $error = "Los datos ingresados no son correctos";
        }
    }
}
?>


<!DOCTYPE html>
<html>
  <head>
    <title>maktub</title>
    <meta charset="utf-8">
    <link href="index2.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Gruppo&family=Shadows+Into+Light+Two&display=swap" rel="stylesheet">
  </head>
  <body class="body-index">
    <header class="header-index">
    </header>
    <main>
      <h1>Juego de lógica</h1>
      <div class="texto-index">
        <marquee>Un valor por nivel ¿En qué secuencia o con qué patrón dicho valor representa el nivel? ¡Una vez que lo descubrás, avanzas!
        </marquee>
      </div>
      <form action="index.php" method="GET">
        <div class="caja">
          <input class="boton" type="submit" name="register"
           value="Registro">
          <input class="boton" type="submit" name="login"
          value="Ingresar">
        </div>
      </form>
      <div class="formulario">
        <div style="z-index:<?php echo $zIndexRegistro?>" class="caja-formulario">
          <div class="formulario">
            <form class="" action="index.php" method="POST">
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
                <input class="login" type="submit" name="" value="Registrarme">
              </div>
            </form>
          </div>
        </div>

        <div style="z-index:<?php echo $zIndexLogin?>" class="caja-formulario">
          <div class="formulario-login">
            <form class="" action="index.php" method="POST">
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
                <input class="login" type="submit" name="" value="Ingresar">
              </div>
            </form>
        </div>
        </div>
      </div>
    </main>
  </body>
</html>
