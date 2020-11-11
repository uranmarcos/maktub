<?php 


if(isset($_GET["reinicio"])){
    $nivel = 1;
    $correctas = 0;
    $incorrectas = 0;
    $consulta = $baseDeDatos-> prepare
    ("UPDATE usuarios SET nivel='$nivel', correctas='$correctas',
    incorrectas='$incorrectas' WHERE mail='$mail'");
    $consulta->execute();
    echo "<script>location.href='index.php?removido=true';</script>";
    exit;
  }
function reiniciar($nivel, $correctas, $incorrectas, $baseDeDatos){
    ("UPDATE usuarios SET nivel='$nivel', correctas='$correctas', incorrectas='$incorrectas' WHERE mail='$mail'");
    $consulta->execute();
    echo "<script>location.href='index.php?removido=true';</script>";
    exit;
}