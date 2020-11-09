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
        <input class="botonInput justify-content-center" type="submit" name="Login" value="Ingresar">
    </diV>
    <div class="row">
        <input class="botonInput botonRecuperar justify-content-center" type="submit" name="RecuperarPass" value="Recuperar contraseña">
    </diV>
</form>