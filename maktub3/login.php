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
    <link href="login.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Gruppo&family=Shadows+Into+Light+Two&display=swap" rel="stylesheet">
  </head>
  <body class="body-login">
    <header class="header-login">
    </header>
    <main>
      <div class="formulario">
        <form class="" action="login.php" method="POST">
          <p class="campos">Mail:
            <div>
              <input class="campoACompletar" type="text" name="mail" value="<?php $mail ?>">
            </div>
          </p>
          <br>
          <p class="campos">Contraseña:
            <div>
              <input class="campoACompletar" type="password" name="pass" value"<?php $password ?>">
            </div>
          </p>
          <br>
          <p class="error">
            <?php echo $error ?>
          </p>
          <div>
            <input class="login" type="submit" name="" value="Ingresar">
          </div>
        </form>
      <div>
    </main>
  </body>
</html>
