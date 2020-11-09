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
