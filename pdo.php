<?php

  $dsn = "mysql:dbname=usuarios; host=127.0.0.1; port=3306";
  $usuario = "root";
  $pass = "";

  try {
    $baseDeDatos = new PDO($dsn, $usuario, $pass);
    $baseDeDatos -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } catch (\Exception $e) {
      echo "Oh no, hubo un error! Vuelves mas tarde?"; exit;
  }
