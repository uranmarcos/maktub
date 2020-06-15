<?php
session_start();
require_once("header.php");

$respuestaFormulario="Tu mensaje se envió correctamente, en breve recibirás nuestra respuesta.";
$errorMail = null;
$errorMensaje = null;
$fechaMensaje = getdate();
$form = NULL;
$confirmacion = NULL;
$jugar = "ocultar";

if($_POST){
  $name = $_SESSION["name"];
  $mail = $_POST["mail"];
  $mensaje = $_POST["mensaje"];

  if(
    (filter_var($mail, FILTER_VALIDATE_EMAIL)== TRUE) &&
    (strlen($_POST["mensaje"])>=10)
    ){
      $form = "form";
      $confirmacion = "Tu mensaje ha sido enviado correctamente.<br> En breve recibirás nuestra respuesta.<br> ¡Gracias por contactarnos!";
      $jugar = "mostrar";
      $mensajeAGuardar[] = [
                  "name"=> $name,
                  "mail" => $mail,
                  "mensaje"=>$mensaje
                ];

      $mensajeJson = json_encode($mensajeAGuardar);
      file_put_contents ("json/mensajes.json", $mensajeJson, FILE_APPEND);
  } elseif(filter_var($mail, FILTER_VALIDATE_EMAIL)== FALSE) {
      $errorMail = "El mail ingresado no tiene un formato correcto";
  }elseif(strlen($_POST["mensaje"])<10)
      $errorMensaje = "El mensaje debe tener al menos 10 caracteres";
}

?>
<!DOCTYPE html>
<html>
  <head>
    <title>Maktub</title>
    <meta charset="utf-8">
    <link href="contact.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Gruppo&family=Shadows+Into+Light+Two&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Shadows+Into+Light+Two&display=swap" rel="stylesheet">
  </head>
  <body class="body-contacto">
    <main class="main-contacto">
          <form action="contacto.php" method="POST">
            <div class="<?php echo $form?>">
              <h3> Si necesitás contactarnos por algún motivo<br>¡dejanos tu mensaje!</h3>
              <p>Mail:</p>
              <p style="color:red"><?php echo $errorMail ?></p>
              <input class="mail" type="mail" name="mail" value=""
                placeholder="En él recibirás tu respuesta">
              <p>Mensaje:</p>
              <p style="color:red"><?php echo $errorMensaje ?></p>
              <textarea class="mensaje" name="mensaje">

              </textarea>
              <input class="enviar" type="submit" name="" value= "ENVIAR">
            </div>
          </form>
          <h2><?php echo $confirmacion ?></h2>
          <h3><a class="<?php echo $jugar?>" href="maktub2.php">Seguir Jugando</a></h3>
    </main>
  </body>
</html>
