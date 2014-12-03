<?php

$foto = $_POST['foto'];
$usuario2 = $_POST['usuario'];
$comentario = $_POST['comentario'];
//print_r($_POST);

include 'funciones.php';
$conexion = conectaBBDD();
$consulta = $conexion->query("INSERT INTO `comentarios`(`foto`,`usuario`,`comentario`) VALUES ('$foto','$usuario2','$comentario')");

if($consulta){
    
    echo '<h3>Well Done</h3>';
    
}else{
    echo '<h3>No se a podido completar</h3>';
}