<form class="col-12 formulario" action="index.php" method="POST">
    <div class="filasForm">
        <label name="name">
            Nombre o apodo:
        </label>
        <input class="input" type="text" name="name" autocomplete="off" placeholder="" value="<?php $nombre ?>">
        <div class="mensajeJs" name="mensajeRegister"></div>
    </div>
    <div  class="filasForm">
        <label name="mail">
            Mail:
        </label>    
        <br>
        <input class="input" type="text" name="mail" autocomplete="off" value="<?php $mail ?>">
        <div class="mensajeJs" name="mensajeRegister"></div>
    </div>
    <div  class="filasForm">
        <label name="pass">
            Contraseña:
        </label>
        <input class="input" type="password" autocomplete="off" name="pass" value="<?php $password ?>">
        <div class="mensajeJs" name="mensajeRegister"></div>
    </div>
    <div  class="filasForm">
        <label name="passConfirm">
            Repetir Contraseña:
        </label>
        <input class="input" type="password" autocomplete="off" name="passConfirm" value="<?php $passwordConfirmacion ?>">
        <div class="mensajeJs" name="mensajeRegister"></div>
    </div>
    <div class="error">
            <?php echo $error?>
        </div>
    <div class="row">
        <input class="botonInput justify-content-center" type="submit" name="Register" value="Registrarme">
    </div>
</form>
