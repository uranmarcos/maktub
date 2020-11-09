<?php
$respuestaFormulario="Tu mensaje se envió correctamente, en breve recibirás nuestra respuesta.";
$errorMail = null;
$errorMensaje = null;
$fechaMensaje = getdate();
$form = NULL;
$confirmacion = NULL;
$jugar = "ocultar";
$name="";
$mail="";

if(isset($_POST["contactar"])){
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


<div class="col-10">
    <div class="<?php echo $form?>">
        <p class="tituloMenu"> Si necesitás contactarnos por algún motivo<br>¡dejanos tu mensaje!</p>
        <form class="formMenu" action="contacto.php" method="POST">
            <label class="textoCampo">Mail:</label>
            <input class="input" type="mail" name="mail" value="" placeholder="En él recibirás tu respuesta">
            <div class="mensajeJs" name="mensajeContacto"></div>
            <label>Mensaje</label>
            <textarea class="input textarea" name="mensaje"></textarea>
            <div class="mensajeJs" name="mensajeContacto"></div>
            <div class="row justify-content-center">
                <input class="col-4 botonInput" type="submit" name="Contacto" value= "ENVIAR">
            </div>        
        </form>
    </div>
    <p style="color:red"><?php echo $errorMail ?></p>
    <p style="color:red"><?php echo $errorMensaje ?></p> 
    <h2><?php echo $confirmacion ?></h2>
    <h3><a class="<?php echo $jugar?>" href="menu.php">Seguir Jugando</a></h3>
</div>