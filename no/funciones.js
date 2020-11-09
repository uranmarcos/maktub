
    //pregunta 1

  



            var pregunta1RespuestaA = document.getElementById("a2p1ra");
            pregunta1RespuestaA.onclick = function(){
                var guardarA='  <?php 
                                $consultaB = $baseDeDatos -> prepare("UPDATE area2 SET uno = 'b' WHERE dni = '30971843'");
                                $consultaB ->execute();
                                $respuestaPreguntaB = $consultaB -> fetchAll(PDO::FETCH_ASSOC); 
                                ?>'  
            } 

            var pregunta1RespuestaB = document.querySelector("#a2p1rb");
            pregunta1RespuestaB.onclick = function(){
                /*<?php 
                   $consultaB = $baseDeDatos -> prepare("UPDATE area2 SET uno = 'b' WHERE dni = '30971843'");
                   $consultaB ->execute();
                   $respuestaPreguntaB = $consultaB -> fetchAll(PDO::FETCH_ASSOC); 
                   alert("elegiste b");
                ?>*/
            } 
            var pregunta1RespuestaC = document.querySelector("#a2p1rc");
            pregunta1RespuestaC.onclick = function(){
                /*<?php 
                     $consulta = $baseDeDatos -> prepare("UPDATE area2 SET uno = 'c' WHERE dni = '30971843'");
                     $consulta ->execute();
                     $respuestaPregunta = $consulta -> fetchAll(PDO::FETCH_ASSOC); 
                ?>*/
            } 

            var pregunta1RespuestaD = document.querySelector("#a2p1rd");
            pregunta1RespuestaD.onclick = function(){
                /*<?php 
                    $consulta = $baseDeDatos -> prepare("UPDATE area2 SET uno = 'd' WHERE dni = '30971843'");
                    $consulta ->execute();
                    $respuestaPregunta = $consulta -> fetchAll(PDO::FETCH_ASSOC); 
                ?>*/
            }


    //pregunta 2
            
            var pregunta2RespuestaA = document.querySelector("#a2p2ra");
            pregunta2RespuestaA.onclick = function(){
                /*var almacenarRespuestaA = "<?php 
                     $consultaA = $baseDeDatos -> prepare("UPDATE area2 SET dos = 'a' WHERE dni = '30971843'");
                     $consultaA ->execute();
                     $respuestaPreguntaA = $consultaA -> fetchAll(PDO::FETCH_ASSOC);?>" 
                almacenarRespuestaA;*/
            } 

            var pregunta2RespuestaB = document.querySelector("#a2p2rb");
            pregunta2RespuestaB.onclick = function(){
                /*<?php 
                    $consultaB = $baseDeDatos -> prepare("UPDATE area2 SET dos = 'b' WHERE dni = '30971843'");
                    $consultaB ->execute();
                    $respuestaPreguntaB = $consultaB -> fetchAll(PDO::FETCH_ASSOC); 
                ?>*/
            } 
            var pregunta2RespuestaC = document.querySelector("#a2p2rc");
            pregunta2RespuestaC.onclick = function(){
                /*<?php 
                    $consultaC = $baseDeDatos -> prepare("UPDATE area2 SET dos = 'c' WHERE dni = '30971843'");
                    $consultaC ->execute();
                    $respuestaPreguntaC = $consultaC -> fetchAll(PDO::FETCH_ASSOC); 
                ?>*/
            } 

            var pregunta2RespuestaD = document.querySelector("#a2p2rd");
            pregunta2RespuestaD.onclick = function(){
                /*<?php 
                   $consultaD = $baseDeDatos -> prepare("UPDATE area2 SET dos = 'd' WHERE dni = '30971843'");
                   $consultaD ->execute();
                   $respuestaPreguntaD = $consultaA -> fetchAll(PDO::FETCH_ASSOC); 
                ?>*/
            }   