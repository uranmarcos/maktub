<form class="col-12 formulario" action="index.php" method="POST">
    <div class="filasForm">
        <label name="name-register">
            Nombre o apodo:
        </label>
        <input class="campoACompletar" type="text" name="nameRegister" placeholder="Entre 3 y 8 caracteres" value="<?php $nombre ?>">
        <div class="error">
            <?php echo $errorName ?>
        </div>
    </div>
    <div  class="filasForm">
        <label name="mailRegister">
            Mail:
        </label>    
        <br>
        <input class="campoACompletar" type="text" name="mailRegister" value="<?php $mail ?>">
        <div class="error">
            <?php echo $errorMail ?>
            <?php echo $errorMailExistente ?>
        </div>
    </div>
    <div  class="filasForm">
        <label name="password">
            Contraseña:
        </label>
        <input class="campoACompletar" type="password" placeholder="Entre 4 y 8 caracteres" name="pass-register" value"<?php $password ?>">
        <div class="error">
            <?php echo $errorPassword ?>
        </div>
    </div>
    <div  class="filasForm">
        <label name="passwordConfRegister">
            Repetir Contraseña:
        </label>
        <input class="campoACompletar" type="password" name="passConfRegister" value"<?php $passwordConfirmacion ?>">
        <div class="error">
            <?php echo $errorPasswordConfirmacion ?>
        </div>
    </div>
    <div class="row">
        <input class="botonEnviar justify-content-center" type="submit" name="" value="Registrarme">
    </div>
</form>