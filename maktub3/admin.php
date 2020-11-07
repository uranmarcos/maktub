<?php
session_start();
require_once("pdo.php");
require_once("header.php");

//variables para la visibilidad de las cajas
$zIndexCajaInicio=1;
$zIndexCajaConsultarNiveles=0;
$zIndexCajaABMNiveles=0;
$zIndexCajaConsultarUsuarios=0;
$zIndexCajaABMUsuarios=0;


$mostrarCajaConsultarNiveles="hidden";


//variable para consulta de niveles
$niveles=[];


//variables para la ABM NIVELES
$numeroDeNivel="";
$valorDeNivel="";
$respuestaDeNivel="";
$crearNivel="";
$eliminarNivel="";
$respuestaABMNiveles="";



/*
$usuarios=0;

$modificarNivel="";
$consultaNiveles="";
$mostrarNiveles ="";
*/


//menu superior
if($_GET){
    if(isset($_GET["consultarNiveles"])){
        $zIndexCajaConsultarNiveles=2;
        include("funciones.php");
        // realizo la consulta a bdd de los niveles            
        $niveles= consultarNiveles($baseDeDatos);
   
    }
    if(isset($_GET["abmNiveles"])){
        $zIndexCajaABMNiveles=2;
    }
    if(isset($_GET["consultarUsuarios"])){
        $zIndexCajaConsultarUsuarios=2;
    }
    if(isset($_GET["abmUsuarios"])){
        $zIndexCajaABMUsuarios=2;
    }
}

if($_POST){
    if(isset($_POST["crearNivel"])){
       VAR_DUMP($_POST);
        $zIndexCajaABMNiveles = 2;
        $numeroDenivel=$_POST["numeroDeNivel"];
        $valorDeNivel = $_POST["valorDeNivel"];
        $respuestaDeNivel = $_POST["respuestaDeNivel"];
        include("funciones.php");
        

        $crearNivel = crearNivel($numeroDeNivel, $valorDeNivel,
                         $respuestaDeNivel, $baseDeDatos);
                         var_dump($_POST);
        
    }
    if(isset($POST["eliminarNivel"])){
        $zIndexCajaABMNiveles = 2;
        $numeroDeNivel=$_POST["numeroDeNivel"];

        include("funciones.php");

        $eliminarNivel=eliminarNivel($numeroDeNivel, $baseDeDatos);
    }
    /*
    if(isset($_POST["modificarNivel"])){
        $nivel=$_POST["numeroDeNivel"];
        $valorNivel = $_POST["valorDeNivel"];
        $respuestaNivel = $_POST["respuestaDeNivel"];
        include("funciones.php");
      
        $modificarNivel = modificarNivel($nivel, $valorNivel, $respuestaNivel, $baseDeDatos);
    }
    if(isset($_POST["modificarNivel"])){
        $nivel=$_POST["numeroDeNivel"];
        $valorNivel = $_POST["valorDeNivel"];
        $respuestaNivel = $_POST["respuestaDeNivel"];
        include("funciones.php");
      
        $modificarNivel = modificarNivel($nivel, $valorNivel, $respuestaNivel, $baseDeDatos);
    }
    */
}

?>

 <!DOCTYPE html>
 <html>
   <head>
     <title>Maktub</title>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.8">
     <link href="https://fonts.googleapis.com/css2?family=Gruppo&family=Shadows+Into+Light+Two&display=swap" rel="stylesheet">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <link rel="stylesheet" href="css/bootstrap.min.css">
     <link href="css/admin3.css" rel="stylesheet">
     <link href="https://fonts.googleapis.com/css2?family=Gruppo&family=Shadows+Into+Light+Two&display=swap" rel="stylesheet">
     <link href="https://fonts.googleapis.com/css2?family=Shadows+Into+Light+Two&display=swap" rel="stylesheet">
   </head>
   <body>
        <div class="row justify-content-center">
                <div class="col-10 col-md-6 col-xl-4 main">
          
                    <form action="admin.php" method="get">
                        <div class="row justify-content-around">
                                <input class="col-5 botonAdmin" type="submit" name="consultarNiveles" value="Consultar niveles">
                                <input class="col-5 botonAdmin" type="submit" name="abmNiveles" value="ABM niveles">
                                
                        </div>
                        <div class="row justify-content-around">
                                <input class="col-5 botonAdmin" type="submit" name="consultarUsuarios" value="Consultar usuarios">
                                <input class="col-5 botonAdmin" type="submit" name="abmUsuarios" value="ABM usuarios">
                        </div>
                    </form>    
                    <div class="contenedor">
                            <!-- caja inicio-->
                            <div style="z-index:<?php echo $zIndexCajaInicio?>" class="cajaInterna">
                                Hola Admin!
                            </div> 
                            <!-- caja consultar niveles-->
                            <div style="z-index:<?php echo $zIndexCajaConsultarNiveles?>" class="cajaInterna">
                                    <div class="row" style="hidden:<?php $mostrarCajaConsultarNiveles?>">
                                                <div class="col-3">
                                                        <em>Nivel</em>
                                                        <br>
                                                        <br>
                                                        <?php  foreach($niveles as $consultaPorNivel){
                                                            echo $consultaPorNivel["nivel"]."<br>";}
                                                        ?>
                                                        <br>
                                                </div>
                                                <div class="col-4">
                                                        <em>Valor</em>   
                                                        <br>
                                                        <br> 
                                                        <?php  foreach($niveles as $consultaPorNivel){
                                                            echo $consultaPorNivel["valor"]."<br>";}
                                                        ?>
                                                        <br>
                                                </div>
                                                <div class="col-4">
                                                        <em>Respuesta</em>
                                                        <br>
                                                        <br>
                                                        <?php  foreach($niveles as $consultaPorNivel){        
                                                             echo $consultaPorNivel["respuesta"]."<br>";}
                                                        ?>
                                                        <br>
                                                </div>    

                                    </div>       
                            </div>
                            <!-- caja abm niveles-->                                    
                            <div style="z-index:<?php echo $zIndexCajaABMNiveles?>" class="cajaInterna">
                                    ABM Niveles
                                    <form class= "row formularioCajaInterior justify-content-around" action="admin.php" method="POST">
                                            <div class="col-3">
                                                    Nivel            
                                                    <input type="text" class="campoABM" name="numeroDeNivel" value="">                
                                            </div>
                                            <div class="col-4">
                                                    Valor        
                                                    <input type="text" class="campoABM" name="valorDeNivel" value="">                
                                            </div> 
                                            <div class="col-4">
                                                    Respuesta        
                                                    <input type="text" class="campoABM" name="respuestaDeNivel" value="">                
                                            </div>
                                            <div class="col-12 red">
                                                    <?php 
                                                        echo $crearNivel; 
                                                        echo $eliminarNivel;
                                                        echo $respuestaABMNiveles
                                                    ?> 
                                            </div>
                                            <div class="col-12">
                                                <br>
                                                <input type="submit" class="botonABM" name="crearNivel" value="Crear Nivel">
                                                <br>
                                                <br>
                                                <input type="submit" class="botonABM" name="modificarNivel" value="Modificar Nivel">
                                                <br>
                                                <br>
                                                <input type="submit" class="botonABM" name="eliminarNivel" value="Eliminar Nivel">                                                           
                                            </div>                    
                                    </form>    
                            </div>


                            <!-- caja consultar usuarios-->                          
                            <div style="z-index:<?php echo $zIndexCajaConsultarUsuarios?>"  class="cajaInterna">
                                consultar Usuarios
                            </div>
                            <!-- caja abm usuarios-->
                            <div style="z-index:<?php echo $zIndexCajaABMUsuarios?>" class="cajaInterna">
                                ABM Usuarios
                                <form class= "row formularioCajaInterior justify-content-around">
                                            <div class="col-4">
                                                    Mail            
                                                    <input type="mail" class="campoABM" name="mailUsuario" value="">                
                                            </div>
                                            <div class="col-4">
                                                    Nombre        
                                                    <input type="text" class="campoABM" name="nombreUsuario" value="">                
                                            </div> 
                                            <div class="col-4">
                                                    Rol
                                                    <input type="text" class="campoABM" name="rolUsuario" value="">                
                                            </div>
                                            <br>  
                                            <div class="col-12">
                                                <br>
                                                <input type="submit" class="botonABM" name="crearUsuario" value="Crear Usuario">
                                                <br>
                                                <br>
                                                <input type="submit" class="botonABM" name="modificarUsuario" value="Modificar Usuario">
                                                <br>
                                                <br>
                                                <input type="submit" class="botonABM" name="eliminarUsuario" value="Eliminar Usuario">                                                           
                                            </div>                    
                                    </form>    
                            </div>
                            
                    </div>    

                </div>

        </div>
      

     <script src="js/jquery-3.5.1.min.js"></script>
     <script src="js/popper.min.js"></script>
     <script src="js/bootstrap.min.js"></script>
   </body>
 </html>