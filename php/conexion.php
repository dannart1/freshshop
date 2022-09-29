<?php
    $servidor="localhost";
    $nombreBD="semillas2";
    $usuario="root";
    $pass="";
    $conexion=new mysqli($servidor,$usuario,$pass,$nombreBD);
    if($conexion-> connect_error){
        die("No se pudo conectar");
    }
?>