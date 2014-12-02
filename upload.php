<?php 
session_start();
if(isset($_SESSION['userName'])) {
  echo "Your session is running " . $_SESSION['userName'];
}
?>
<?php
 //directorio de almacén de imágenes

 $nomFoto = $_POST['nomfoto'];
 $usuFoto = $_SESSION['userName'];
//$usuFoto = $_POST['usuFoto'];
 

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
$consulta = $conexion->query("INSERT INTO `fotosSubidas`(`nombre`,`ruta`,`usuario`) VALUES ('$nomFoto','$nombre_fichero_sin_espacios','$usuFoto')");

// echo '{"name":"'.$uploadfile.'"}'; 
 //echo 'La sesión ha sido cerrada. <br><br><a href="index.php">Vuelve a la pagina inicio</a>';
 header( "refresh:2;url=index.php" );
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Lo Que Te Salga</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/stylish-portfolio.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

    
    
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.10/themes/base/jquery-ui.css"
        id="theme">
    <link rel="stylesheet" href="js/jquery.fileupload-ui.css">
    
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.10/jquery-ui.min.js"></script>
    <script src="js/jquery.fileupload.js"></script>
    <script src="js/jquery.fileupload-ui.js"></script>
    
</head>
<body>
    <header id="top" class="header">
        <div id="cosa"class="text-vertical-center">
            <h1><font color="white">Hasta luego !</font></h1>
            <br>
            <br>
            <h3><font color="white">Que tenga un buen día</font></h3>
        </div>
    </header>
    
</body>
</html>

