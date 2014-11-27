<?php

function conectaBBDD(){
    
    $conexion = new mysqli('localhost', 'root', '','aprueba');
    $consulta = $conexion ->query("set names UTF8");
    return $conexion;
    
    
}

?>
