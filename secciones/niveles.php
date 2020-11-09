<div class="row">
    <div class="col-12 cajaTexto">
        <MARQUEE><?php echo $texto?></MARQUEE>
    </div>
    <div class="col-12 cajaValor">
            <p><?php echo $valor?></p>
            <h3><?php echo $mensajeError ?></h3>
            <p class="<?php echo $nivel22?>">veinte mas dos</p>
    </div>
    <form class="col-12 respuesta" style="display:<?php echo $ocultar?>;" action="maktub.php" autocomplete="off" method="POST">
        <input class="row  inputRespuesta" type="text" name="respuesta" method="POST">
        <input class="row justify-content-center botonEnviar" type= "submit" name="enviar" value= "ENVIAR">        
    </form>
    <div class="probar justify-content-center col-6 <?php echo $probar?>">
            <a href="maktub.php">Probar de nuevo</a>
    </div>
    <div class="nivel col-12" style="display:<?php echo $ocultar?>;">
            <h4><?php echo $nivel?></h4>
    </div>
</div>

