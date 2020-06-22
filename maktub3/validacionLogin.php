<?php
  include("pdo.php");
//ALMACENO EN VARIABLES LOS DATOS INGRESADOS EN EL FORMULARIO
if($_POST){
  $mail = $_POST["mailLogin"];
  $password = $_POST["pass-login"];
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
