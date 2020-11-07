<form class="formulario" action="index.php" method="POST">
    <div class="filasForm">
        <label name="mail">
            Mail:
        </label>
        <input class="input" type="text" name="mail" value="<?php $mail ?>">
        <div class="mensajeJs" name="mensajeLogin"></div>
    </div>
    <div class="filasForm">
        <label  name="password">
            Contraseña:
        </label>    
        <input class="input" type="password" name="pass" value="<?php $password ?>">
        <div class="mensajeJs" name="mensajeLogin"></div>
    </div>
    
    <p class="error">
        <?php echo $error ?>
    </p>
    <div class="row">
        <input class="botonInput ustify-content-center" type="submit" name="Login" value="Ingresar">
    </diV>
    <div class="recuperarPass">
        <a href="recuperarPass.php">Olvidé mi contraseña</a>
    </div>
</form>