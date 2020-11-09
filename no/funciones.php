<?php

function validarUsuario($mail, $password, $baseDeDatos){
        $consulta = $baseDeDatos -> prepare("SELECT * FROM usuarios WHERE mail = '$mail' ");
        $consulta -> execute();
        $datosUsuario = $consulta -> fetchAll(PDO::FETCH_ASSOC); 
        
                
        if(empty($datosUsuario)){
            $error = "El mail ingresado no está registrado";
            return $error;
        }else{
            $resultadoVerificacion = password_verify($password, $datosUsuario[0]["password"]);
            if((mb_strtolower($mail) === mb_strtolower($datosUsuario[0]["mail"])) && ($resultadoVerificacion == true)){
                $_SESSION["usuarioLogueado"]=true;
                $_SESSION["name"] = $datosUsuario[0]["name"];
                $_SESSION["nivel"] = $datosUsuario[0]["nivel"];
                $_SESSION["mail"] = $datosUsuario[0]["mail"];
                $_SESSION["nivel"] = $datosUsuario[0]["nivel"];
                $_SESSION["correctas"] = $datosUsuario[0]["correctas"];
                $_SESSION["incorrectas"] = $datosUsuario[0]["incorrectas"];
                $_SESSION["rol"] = $datosUsuario[0]["rol"];
                echo "<script>location.href='help.php?removido=true';</script>";
                } else {
                    $error = "Los datos ingresados no son correctos";
                    return $error;
                }
        }
}    


//funcion para crear nivel - admin.php
function crearNivel($numeroDeNivel, $valorDeNivel, $respuestaDeNivel, $baseDeDatos){
    // si no completó alguno de los campos devuelvo error
    if( ($numeroDeNivel=='') || ($valorDeNivel=='') || ($respuestaDeNivel=='') ){
            $respuestaABMNiveles = 'Debe completar todos los campos';
            return $respuestaABMNiveles;    
    }
    if( ($numeroDeNivel != '') && ($valorDeNivel !='') && ($respuestaDeNivel !='') ){
            /*consulto a base de datos todos los valores del nivel ingresaro por formulario
            y almaceno en variable*/
            $consulta = $baseDeDatos -> prepare("SELECT * FROM niveles WHERE nivel = '$numeroDeNivel' ");
            $consulta -> execute();
            $consultaNivel = $consulta -> fetchAll(PDO::FETCH_ASSOC); 
            //si el nivel no existe en bdd lo creo, si existe brindo error
            if(empty($consultaNivel)){
                    $consulta = $baseDeDatos -> prepare("INSERT INTO niveles VALUES
                        ('$numeroDeNivel', '$valorDeNivel', '$respuestaDeNivel')");
                    $consulta    -> execute();
                    $respuestaABMNiveles="El nivel $numeroDeNivel ha sido creado";
                    return $respuestaABMNiveles;
            } else {
                    $respuestaABMNiveles = "El nivel ingresado ya existe";
                    return $respuestaABMNiveles;
            }        
    }
}
function eliminarNivel($numeroDeNivel, $baseDeDatos){
    $consulta = $baseDeDatos -> prepare("DELETE * FROM niveles WHERE nivel = $numeroDeNivel");
    $consulta -> execute();
    $respuestaABMNiveles = "El nivel ha sido eliminado";
    return $respuestaABMNiveles;
}    


function modificarNivel($nivel, $valorNivel, $respuestaNivel, $baseDeDatos){
    $consulta = $baseDeDatos -> prepare("SELECT * FROM niveles WHERE nivel = '$nivel' ");
    $consulta -> execute();
    $consultaNivel = $consulta -> fetchAll(PDO::FETCH_ASSOC); 
        
    if(empty($consultaNivel)){
            $modificarNivel = "El nivel ingresado no existe, debe crearlo";
            return $modificarNivel;
    }else{
            $consulta = $baseDeDatos -> prepare("UPDATE niveles SET 
                                    valor ='$valorNivel', respuesta = '$respuestaNivel' WHERE nivel ='$nivel' ");
            $consulta    -> execute();
            $modificarNivel="El nivel $nivel ha sido modificado";
            return $modificarNivel;
    }        
}


/*consulto a base de datos info de los niveles y almaceno en variable
para mostrar en consulta de admin*/
function consultarNiveles($baseDeDatos){
    $consulta = $baseDeDatos -> prepare("SELECT * FROM niveles");
    $consulta -> execute();
    $consultaNiveles = $consulta -> fetchAll(PDO::FETCH_ASSOC); 

    return $consultaNiveles;

}
/*
function mostrarNiveles($niveles){
    foreach($niveles as $consultaPorNivel){
        $numeroNivel = $consultaPorNivel["nivel"];
        $valorNivel =$consultaPorNivel["valor"];
        $respuestaNivel = $consultaPorNivel["respuesta"] . "<br>";  
        echo $numeroNivel . $valorNivel . $respuestaNivel;
    }  
}
*/



