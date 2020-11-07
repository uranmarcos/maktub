<div>
    <MARQUEE><?php echo $texto?></MARQUEE>
</div>
<div class="caja-valor">
    <h1><?php echo $valorAMostrar?></h1>
    <h2><?php echo $mensajeError ?></h2>
    <p class="<?php echo $nivel22?>">veinte mas dos</p>
</div>
<div class="respuesta">
    <form class="" action="maktub.php" autocomplete="off" method="GET">
        <input class="campo-respuesta <?php echo $ocultar?>" type="text" name="respuesta" method="GET">
        <br>
        <input class="enviar" type= "<?php echo $botonEnviar ?>" name= " " value= "ENVIAR">
        <div class="<?php echo $probar?>">
            <a href="maktub0.php">Probar de nuevo</a>
        </div>
    </form>
</div>
<div class="nivel">
    <h3><?php echo $nivel ?></h3>
</div>