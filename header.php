<!--<div class="row justify-content-center">
    <div class="col-10 col-md-6 col-xl-4">
        <div class="row align-items-center head">
            <div class="col-6 caja-header-left">
            </div>
            <div class="col-6">
                <div class="row justify-content-end">
                    <div class="col-auto">
                        <button id="menu"><?php echo $logueo ?></button>
                        <nav id="superior">
                            <ul class="opciones-burguer">
                                    <li><a class="opciones-menu" href="admin.php" style="display:<?php echo $administrador ?>">Admin</a></li>
                                    <li><a class="opciones-menu" href="contacto.php">Contacto</a></li>
                                    <li><a class="opciones-menu" href="estadisticas.php">Estadisticas</a></li>
                                    <li><a class="opciones-menu" href="logout.php">Cerrar sesión</a></li>
                                    <li><a class="opciones-menu" href="reiniciar.php">Reiniciar</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<botton class="col-3" href="admin.php" style="display:</*?php echo $administrador ?>">Admin</a></li>
-->
<div class="col-12 header">        
</div>
<div class="col-12">          
    <nav class="row">   
            <div class="col-6 opcionesNav saludo">
                ¡Hola <?php echo $logueo?>!
            </div>    
            <div class="col-6 opcionesNav" onmouseover="mostrarMenu()" onclick="ocultarMenu()"  id="menu"> 
                Menu
            </div>
    </nav>    
    <div class="row">
        <form class="ocultar" id="formMenu"  action="menu.php" method="POST">    
            <input class="boton" type="submit" name="perfil" value="Perfil">
            <input class="boton" type="submit" name="contacto" value="Contacto">
            <input class="boton" type="submit" name="estadisticas" value="Estadísticas">
            <input class="boton" type="submit" name="salir" value="Cerrar Sesion">
            <input class="boton" type="submit" name="reiniciar" value="Reiniciar">
        </form>
    </div>    
     
</div>
