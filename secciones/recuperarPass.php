<form class="col-12 formulario" action="index.php" method="POST">
    <div class="filasForm">
        <label class="titulo">
            Recuperá tu contraseña
        </label>
        <label name="name">
            Nombre:
        </label>            
        <input class="input" autocomplete="off" placeholder="Ingresá el nombre registrado" type="text" name="name" value="">
        <div class="mensajeJs" name="mensajeRecuperar"></div>
    </div>
    <div class="filasForm">
        <label name="mail">
            Mail:
        </label>
        <input class="input" placeholder="Ingresá el mail registrado" type="mail" name="mail" value="">
        <div class="mensajeJs" name="mensajeRecuperar"></div>
    </div>
    <div class="filasForm">
        <label name="newPass">
            Nueva contraseña:
        </label>
        <input class="input" placeholder="Entre 4 y 8 caracteres" type="password" name="pass" value="">
        <div class="mensajeJs" name="mensajeRecuperar"></div>
    </div>
    <div class="filasForm">
        <label name="confirmPass">
            Confirmá la contraseña:
        </label>
        <input class="input" type="password" name="passConfirm" value="">
        <div class="mensajeJs" name="mensajeRecuperar"></div>
    </div>
    <p class="error">
        <?php echo $error ?>
    </p>
    <div class="row">
        <input class="botonInput justify-content-center" type="submit" name="Recuperar" value="Confirmar">
    </div>           
</form>