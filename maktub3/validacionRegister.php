<?php
include("pdo.php");
//tomo los datos de los campos del formulario y los cargo en variables
if($_POST){
  $name = $_POST["name-register"];
  $mail = $_POST["mail-register"];
  $password = $_POST["pass-register"];
  $hash = password_hash($password, PASSWORD_DEFAULT);
  $passwordConfirmacion = $_POST["passconf-register"];
}

if($_POST){
  //errores campos formulario
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
        if($password != $passwordConfirmacion){
          $errorPasswordConfirmacion = "Las contraseñas ingresadas no coinciden";
        }
      }
  //Si datos válidos, almaceno en BDD
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
            echo "<script>location.href='index.php?boton-login=Ingresar';</script>";
            exit;
          }
}
