<div class="col-10">
        <p class= "tituloMenu"><?php echo $mensaje ?></p>
        <div class="row">
            <div class= "col-6 columnaIzquierda">
                <p>Tu promedio: </p>
            </div>
            <div class= "col-6 columnaDerecha">
                <p><?php echo round($porcentajeCorrectas)?>%</p>
            </div>
        </div>
        <div class="row">
            <div class= "col-6 columnaIzquierda">
                <p>Promedio general:</p>
            </div>
            <div class= "col-6 columnaDerecha">
                <p><?php echo $promedioNivel?> %</p>
            </div>
        </div>    
        <div class="row">
            <div class= "col-6 columnaIzquierda">
                <p>Nivel:</p>
            </div>
            <div class= "col-6 columnaDerecha">
                <p><?php echo $nivel ?></p>
            </div>
        </div>    
        <div class="row">      
            <div class= "col-6 columnaIzquierda">
                <p>Puesto:</p>
            </div>
            <div class= "col-6 columnaDerecha">
                <p><?php echo $rankingNivel?></p>
            </div>
        </div>    
        <div class="row">      
            <div class= "col-6 columnaIzquierda">
                <p>Respondiste:</p>
            </div>
            <div class= "col-6 columnaDerecha">
                <p><?php echo $correctas ?> <?php echo $vecesCorrectas?> bien! ;)</p>
            </div>
        </div>    
        <div class="row">      
            <div class= "col-6 columnaIzquierda">
                <p>Pifiaste</p>
            </div>
            <div class= "col-6 columnaDerecha">
                <p><?php echo $incorrectas ?> <?php echo $vecesIncorrectas?> </p>
            </div>
        </div>    
        <div class="row cajaPorcentaje justify-content-center">
            <div class="porcentaje">
                <p><?php echo round($porcentajeDeJuego) ?> %</p>
            </div>
            
                <div class="porcentajeDeJuego" style="width:<?php echo round($porcentajeDeJuego)?>%">
                </div>
            
        </div>
        <br>
        <form class="row justify-content-center" name="" action="menu.php" method="POST">
            <input class="botonInput col-6 seguirJugando" type="submit" name="seguirJugando" value="Seguir jugando">
        </form>
</div>

