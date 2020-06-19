<?php
session_start();
include("pdo.php");
//Declaro las variables a usar
  $name= "";
  $mail = "";
  $password = "";
  $errorName = "";
  $errorMail = "";
  $errorMailExistente = "";
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
        echo "<script>location.href='login.php?removido=true';</script>";
        exit;
    }
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <title>maktub</title>
    <meta charset="utf-8">
    <link href="register.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Gruppo&family=Shadows+Into+Light+Two&display=swap" rel="stylesheet">
  </head>
  <body class="body-index">
    <header class="header-register">

    </header>
    <main>
      <div class="formulario">
        <form class="" action="register.php" method="POST">
          <p class="campos">Nombre o apodo:
            <div>
              <input class="campoACompletar" type="text" name="name" placeholder="Entre 3 y 8 caracteres" value="<?php $nombre ?>">
            </div>
            <p class="error">
              <?php echo $errorName ?>
            </p>
          </p>

          <p class="campos">Mail:
            <div>
              <input class="campoACompletar" type="text" name="mail" value="<?php $mail ?>">
            </div>
            <p class="error">
              <?php echo $errorMail ?>
              <?php echo $errorMailExistente ?>
            </p>
          </p>

          <p class="campos">Contraseña:
            <div>
              <input class="campoACompletar" type="password" placeholder="Entre 4 y 8 caracteres" name="pass" value"<?php $password ?>">
            </div>
            <p class="error">
              <?php echo $errorPassword ?>
            </p>
          </p>

          <p class="campos">Repetir Contraseña:
            <div>
              <input class="campoACompletar" type="password" name="passconf" value"<?php $passwordConfirmacion ?>">
            </div>
            <p class="error">
              <?php echo $errorPasswordConfirmacion ?>
            </p>
          </p>
          <div>
            <input class="registrar" type="submit" name="" value="Registrarme">
          </div>
        </form>
      <div>
    </main>
  </body>
</html>
