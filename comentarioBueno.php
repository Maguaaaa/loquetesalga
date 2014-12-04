<?php

$foto = $_POST['foto'];
$usuario2 = $_POST['usuario'];
$comentario = $_POST['comentario'];
//print_r($_POST);

include 'funciones.php';
$conexion = conectaBBDD();
$consulta = $conexion->query("INSERT INTO `comentarios`(`foto`,`usuario`,`comentario`) VALUES ('$foto','$usuario2','$comentario')");
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
            <h1><font color="white"><?php if($consulta){
    
    echo '<h3>Well Done</h3>';
    
}else{
    echo '<h3>No se a podido completar</h3>';
} ?></font></h1>
            <br>
            <br>
            <h3><font color="white"><a href="index.php">Vuelve al inicio</a></font></h3>
        </div>
    </header>
    
</body>
</html>


