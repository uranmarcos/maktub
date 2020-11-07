<?php
function recuperarPassword($name, $mail, $password, $passwordConfirmacion, $hash, $baseDeDatos){
    $consulta = $baseDeDatos ->prepare("SELECT * FROM usuarios WHERE mail = '$mail'");
    $consulta->execute();
    $datosUsuarios =$consulta -> fetchAll(PDO::FETCH_ASSOC);

    foreach ($datosUsuarios as $datoUsuario) {
        if((mb_strtolower($mail) === mb_strtolower($datoUsuario["mail"])) &&
              ($name === ($datoUsuario["name"])) && ($password === $passwordConfirmacion)){
                $consulta = $baseDeDatos-> prepare
                    ("UPDATE usuarios SET password ='$hash' WHERE mail = '$mail'");
                $consulta->execute();
                echo "<script>location.href='index.php?botonLogin=Ingreso';</script>";
                exit;
            } else {
                $error = "Los datos ingresados no son correctos";
                return $error;
              }
          }
    }

function register($mail, $name, $hash, $baseDeDatos){
    $mailIngresado=mb_strtolower($mail);
    $consultaMail = $baseDeDatos ->prepare ("SELECT * FROM usuarios WHERE mail = '$mailIngresado'");
    $consultaMail -> execute();
    $usuarios = $consultaMail->fetchAll(PDO::FETCH_ASSOC);

    if(!empty($usuarios)){
        $error = "El mail ingresado ya está registrado";
        return $error;
    }else{$consulta =  $baseDeDatos -> prepare
        ("INSERT INTO usuarios(mail, name, password, nivel, correctas, incorrectas) VALUES ('$mail', '$name', '$hash', '1', '0', '0')");
        $consulta -> execute();
        $mensajeRegistrado = "Ya estás registrado. ¡Ingresá para comenzar a jugar!";
            echo "<script>location.href='index.php?botonLogin=Ingreso';</script>";
            exit;
    }
}
function login($mail, $password, $baseDeDatos){
    $consulta = $baseDeDatos -> prepare("SELECT * FROM usuarios WHERE mail = '$mail' ");
    $consulta -> execute();
    $datosUsuario = $consulta -> fetchAll(PDO::FETCH_ASSOC); 
    if(empty($datosUsuario)){
        $error = "El mail ingresado no está registrado";
        return $error;
    }else{
        $resultadoVerificacion = password_verify($password, $datosUsuario[0]["password"]);
        if($resultadoVerificacion == true){
            $_SESSION["usuarioLogueado"]=true;
            $_SESSION["name"] = $datosUsuario[0]["name"];
            $_SESSION["nivel"] = $datosUsuario[0]["nivel"];
            $_SESSION["mail"] = $datosUsuario[0]["mail"];
            $_SESSION["nivel"] = $datosUsuario[0]["nivel"];
            $_SESSION["correctas"] = $datosUsuario[0]["correctas"];
            $_SESSION["incorrectas"] = $datosUsuario[0]["incorrectas"];
            $_SESSION["rol"] = $datosUsuario[0]["rol"];
            echo "<script>location.href = 'maktub.php';</script>";
            exit;
            } else {
                $error = "Los datos ingresados no son correctos";
                return $error;
            }
    }
}