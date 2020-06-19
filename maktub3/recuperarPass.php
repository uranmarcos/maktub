<?php
 session_start();
  include("pdo.php");

  //DECLARO VARIABLES A USAR
  $mail = "";
  $password = "";
  $error = "";
  $resultadoVerificacion=[];



  //ALMACENO EN VARIABLES LOS DATOS INGRESADOS EN EL FORMULARIO
  if ($_POST){
    $name = $_POST["mail"];
    $mail = $_POST["mail"];
    $password = $_POST["pass"];
    $hash = password_hash($password, PASSWORD_DEFAULT);
    $passwordConfirmacion = $_POST["passconf"];
  }

  //VALIDO LOS DATOS INGRESADOS CON BDD, Y ALMACENO EN SESSION
  if ($_POST){
      $consulta = $baseDeDatos ->prepare("SELECT * FROM usuarios");
      $consulta->execute();
      $datosUsuarios =$consulta -> fetchAll(PDO::FETCH_ASSOC);

      foreach ($datosUsuarios as $datoUsuario) {
        if((mb_strtolower($mail) === mb_strtolower($datoUsuario["mail"])) &&
          ($name === ($datoUsuario["mail"])) && ($password === $passwordConfirmacion)){
            $consulta = $baseDeDatos-> prepare
            ("UPDATE usuarios SET password='$hash'
            WHERE mail = '$mail'");
            $consulta->execute();
            echo "<script>location.href='index.php?removido=true';</script>";
            exit;
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
    <link href="login.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Gruppo&family=Shadows+Into+Light+Two&display=swap" rel="stylesheet">
  </head>
  <body class="body-login">
    <header class="header-login">
    </header>
    <main>
      <div class="formulario">
        <form class="" action="recuperarPass.php" method="POST">
          <p class="campos">Nombre:
            <div>
              <input class="campoACompletar" placeholder="Ingresá el nombre registrado" type="text" name="name" value="<?php $name ?>">
            </div>
          </p>
          <p class="campos">Mail:
            <div>
              <input class="campoACompletar" placeholder="Ingresá el mail registrado" type="mail" name="mail" value="<?php $mail ?>">
            </div>
          </p>
          <p class="campos">Ingresá una nueva contraseña:
            <div>
              <input class="campoACompletar" placeholder="Entre 4 y 8 caracteres" type="password" name="pass" value"<?php $password ?>">
            </div>
          </p>
          <p class="campos">Repeti tu nueva contraseña:
            <div>
              <input class="campoACompletar" type="password" name="passconf" value="<?php $passwordConfirmacion ?>">
            </div>
          </p>
          <p class="error">
            <?php echo $error ?>
          </p>
          <div>
            <input class="login" type="submit" name="" value="Confirmar">
          </div>
        </form>
      </div>
    </main>
  </body>
</html>
