<?php
//valido usuario logueado
    if($_SESSION["usuarioLogueado"] == false){
        header("Location: index.php");
        } else{
            $logueo = $_SESSION["name"];
            $mail = $_SESSION["mail"];
            $rol = $_SESSION["rol"];
            
            if($rol == "admin"){
                $administrador = "block";
            }else{
                $administrador="none";
            }
    }






//funciones login.php
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
                    echo "<script>location.href = 'start.php';</script>";
                    exit;
                    } else {
                        $error = "Los datos ingresados no son correctos";
                        return $error;
                    }
            }
        }

// funciones maktub.php 
        $mensajeError=NULL;
        $nivel22="ocultar";
        $ocultar="mostrar";
        $probar ="ocultar";
        $compararRespuesta=Null;
        function consultarNivel($mail, $baseDeDatos){
            $query = $baseDeDatos -> Prepare ("SELECT * FROM usuarios where mail = '$mail'");
            $query -> execute();
            $consultaBDD = $query -> fetch(PDO::FETCH_ASSOC);
            return $nivel = $consultaBDD["nivel"];
        }
        function consultarValor($nivel, $baseDeDatos){
            $consulta = $baseDeDatos -> Prepare ("SELECT * FROM niveles where nivel = '$nivel'");
            $consulta -> execute();
            $consultaRespuesta = $consulta -> fetch(PDO::FETCH_ASSOC);
            return $valor = $consultaRespuesta["valor"];
        }
        function consultarRespuesta($nivel, $baseDeDatos){
            $consulta = $baseDeDatos -> Prepare ("SELECT * FROM niveles where nivel = '$nivel'");
            $consulta -> execute();
            $consultaRespuesta = $consulta -> fetch(PDO::FETCH_ASSOC);
            return $respuestaCorrecta = $consultaRespuesta["respuesta"];
        }
        function compararRespuesta($respuestaIngresada, $respuestaCorrecta){
            return ($respuestaIngresada == $respuestaCorrecta);
        }
        function cambiarNivel($nivel, $baseDeDatos, $mail){
            $nivelFinal = $nivel+1;
            $correctas = $nivel-1;
            $consulta = $baseDeDatos-> prepare ("UPDATE usuarios SET nivel='$nivelFinal', correctas = '$correctas' WHERE mail = '$mail'");
            $consulta->execute();
            header("Location:maktub.php"); 
        }
        function mensajeError($errores){
            $variableError = array_rand($errores, 1);
            $error= $errores[$variableError];
            return $error;
        }
        function almacenarRespuestaIncorrecta($mail, $nivel, $respuestaIngresada){
                $mensajeAGuardar[] = [
                    "mail" => $mail,
                    "nivel" => $nivel,
                    "mensaje"=>$respuestaIngresada
                ];
                $mensajeJson = json_encode($mensajeAGuardar);
                file_put_contents ("json/respuestas.json", $mensajeJson, FILE_APPEND);
        }

        function actualizarIncorrectas($mail, $baseDeDatos){
            $consulta = $baseDeDatos-> prepare
            ("SELECT incorrectas FROM usuarios WHERE mail = '$mail'");
            $consulta->execute();
            //le sumo uno al valor por esta respuesta incorrecta
            $incorrectas = $consulta->fetch(PDO::FETCH_ASSOC);
            $incorrectas["incorrectas"] = $incorrectas["incorrectas"]+1;
            $incorrectasFinal = ($incorrectas["incorrectas"]);
            //mando nuevamente a BDD el valor actualizado
            $consulta2 = $baseDeDatos-> prepare
            ("UPDATE usuarios SET incorrectas = '$incorrectasFinal'
            WHERE mail = '$mail'");
            $consulta2->execute();

        }
        function mostrarTexto($textoEnMovimiento){
            $posicionTexto = array_rand($textoEnMovimiento, 1);
            $texto = $textoEnMovimiento[$posicionTexto];
            return $texto;
        }



//funciones menu.php
    $nivel ="";
    $correctas = "";
    $incorrectas = "";
    function reiniciar($nivel, $correctas, $incorrectas, $mail, $baseDeDatos){
        $nivel = 1;
        $correctas = 0;
        $incorrectas = 0;
        $consulta = $baseDeDatos-> prepare("UPDATE usuarios SET nivel='$nivel', correctas='$correctas', incorrectas='$incorrectas' WHERE mail='$mail'");
        $consulta->execute();
        echo "<script>location.href='index.php?removido=true';</script>";
        exit;
    }



