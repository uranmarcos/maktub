<?php
session_start();
require("pdo.php");
?>
<body>
<form action="prueba.php">
    <div>
        Pregunta 1
        <br>
        Cuál elegis?
        
        </script>    
        <div id="pregunta1">
                <br>
                <input type="radio" id="1a"  name="area2pregunta1" value="a">a
                <br>
                <input type="radio" id="1b"  name="area2pregunta1" value="b">b
                <br>
                <input type="radio" id="1c"  name="area2pregunta1" value="c">c
                <br>
                <input type="radio" id="1d"  name="area2pregunta1" value="d">d
        </div>
    </div>    
    <div>
        Pregunta 2
        <br>
        Hola, que tal, como te va?
        <br>
        <input type="radio" id="a2p2ra" name="area2pregunta2" value="a">a
        <br>
        <input type="radio" id="a2p2rb" name="area2pregunta2" value="b">b
        <br>
        <input type="radio" id="a2p2rc" name="area2pregunta2" value="c">c
        <br>
        <input type="radio" id="a2p2rd" name="area2pregunta2" value="d">d
    </div>    
</form>

<script>
        var opcion1a = document.getElementById("1a");
        var opcion1b = document.getElementById("1b");
        var opcion1c = document.getElementById("1c");
        var opcion1d = document.getElementById("1d");
        
        opcion1a.onclick = function(){
            resaltar();
        }
        function resaltar(){
            console.log("a");
            console.log(opcion1a);
            document.getElementById("1a").style.border = "4px solid red";
            alert("a");
        }


</script>

  
        </body>