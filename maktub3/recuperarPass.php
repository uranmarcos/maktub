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
    <meta name="viewport" content="width=device-width, initial-scale=1.8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Gruppo&family=Shadows+Into+Light+Two&display=swap" rel="stylesheet">
    <link href="css/index3.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Gruppo&family=Shadows+Into+Light+Two&display=swap" rel="stylesheet">
  </head>
  <body>
    <header class="row justify-content-center">
      <div class="col-10 col-md-6 col-xl-4 header">
      </div>
    </header>
    <main class="row justify-content-center">
      <div class="col-10 col-md-6 col-xl-4">
      
      <!--  titulo -->
          <div class= "row">
            <div class= "col-12 justify-content-center">
              <h1>Juego de lógica</h1>
            </div>
          </div>
           
          <div class="row">
            <div class="col-12 caja-compartida">
              <form class="caja-interna" action="recuperarPass.php" method="POST">
                <p>Recuperá tu contraseña</p>
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
                <p class="campos">Nueva contraseña:
                  <div>
                    <input class="campoACompletar" placeholder="Entre 4 y 8 caracteres" type="password" name="pass" value"<?php $password ?>">
                  </div>
                </p>
                <p class="campos">Confirmá la contraseña:
                  <div>
                    <input class="campoACompletar" type="password" name="passconf" value="<?php $passwordConfirmacion ?>">
                  </div>
                </p>
                <p class="error">
                  <?php echo $error ?>
                </p>
                <div class="row">
                      <input class="boton-enviar col-4 justify-content-center" type="submit" name="" value="Confirmar">
                </div>
                  
                
              </form>
            </div>  
          </div>

       </div>
    </main>

    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
