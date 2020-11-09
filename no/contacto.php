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
    <meta name="viewport" content="width=device-width, initial-scale=1.8">
    <link href="https://fonts.googleapis.com/css2?family=Gruppo&family=Shadows+Into+Light+Two&display=swap" rel="stylesheet">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="css/contacto0.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Gruppo&family=Shadows+Into+Light+Two&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Shadows+Into+Light+Two&display=swap" rel="stylesheet">
  </head>
  <body>
    <main class="row justify-content-center main">
      <div class="col-10 col-md-6 col-xl-4">
        <div class="<?php echo $form?>">
          <h3> Si necesitás contactarnos por algún motivo<br>¡dejanos tu mensaje!</h3>
          <form action="contacto.php" method="POST">
            <p>Mail:</p>
            <p style="color:red"><?php echo $errorMail ?></p>
            <input class="mail" type="mail" name="mail" value=""
              placeholder="En él recibirás tu respuesta">
            <p>Mensaje:</p>
            <p style="color:red"><?php echo $errorMensaje ?></p>
            <textarea class="mensaje" name="mensaje">
            </textarea>
            <input class="enviar" type="submit" name="" value= "ENVIAR">
          </form>
        </div>
        <h2><?php echo $confirmacion ?></h2>
        <h3><a class="<?php echo $jugar?>" href="maktub2.php">Seguir Jugando</a></h3>
      </div>
    </main>


    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
