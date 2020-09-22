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

