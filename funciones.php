
<?php

function conectaBBDD(){
    
    $conexion = new mysqli('localhost', 'root', '','imagenes');
    $consulta = $conexion ->query("set names UTF8");
    return $conexion;
}

?>
