<form class="formulario" action="index.php" method="POST">
    <div class="filasForm">
        <label name="mailLogin">
            Mail:
        </label>
        <input class="campoACompletar" type="text" name="mailLogin" value="<?php $mail ?>">
    </div>
    <div class="filasForm">
        <label  name="password">
            Contraseña:
        </label>    
        <input class="campoACompletar" type="password" name="passwordLogin" value="<?php $password ?>">
    </div>
    <div class="recuperarPass">
        <a href="recuperarPass.php">Olvidé mi contraseña</a>
    </div>
    <p class="error">
        <?php echo $error ?>
    </p>
    <div class="row">
        <input class="botonEnviar ustify-content-center" type="submit" name="botonLogin" value="Ingresar">
    </diV>
</form>