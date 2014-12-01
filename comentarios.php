<link href="css/estilo.css" rel="stylesheet" type="text/css">

<?php
error_reporting(E_PARSE);
function conectaBBDD(){
    $conexion = new mysqli('localhost','root','','loquetesalga');
    $consulta = $conexion->query("SET NAMES UTF8");
    return $conexion;
}
function limpia($palabras){
   $palabras =  trim($palabras, "'");
   $palabras =  trim($palabras, "=");
   $palabras =  trim($palabras, '"');
   return $palabras;
}




