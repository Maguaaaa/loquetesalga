<?php
 //directorio de almacén de imágenes

 

$uploaddir = 'img/';

 $tmp_name = $_FILES['file']['tmp_name'];

 //nombre del fichero sin espacios en blanco
 $nombre_fichero_sin_espacios=str_replace(" ","",$_FILES['file']['name']);

 //ruta completa del fichero
 $uploadfile = $uploaddir . $nombre_fichero_sin_espacios;

 //nombre del fichero
 $file_name=$_FILES['file']['name'];

 //compruebo si existe el directorio y si no existe lo creo
 if(!is_dir($uploaddir)){
 @mkdir($uploaddir, 0700);
 }

 //compruebo si existe el fichero y si existe le pongo _copia_ en el nombre
 if (file_exists($uploadfile)){
 $uploadfile = $uploaddir ."_copia_". $nombre_fichero_sin_espacios;
 $file_name="_copia_" .$nombre_fichero_sin_espacios;
 } 

 move_uploaded_file($tmp_name,$uploadfile);
 
 include 'funciones.php';
$conexion = conectaBBDD();
$consulta = $conexion->query("INSERT INTO `fotos`(`id`, `nombre`) VALUES ('7','$nombre_fichero_sin_espacios')");

 echo '{"name":"'.$uploadfile.'"}';                   
?>

