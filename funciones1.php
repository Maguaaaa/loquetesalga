

<html>
    <head>
        
           
<meta charset="UTF-8">
        <title>Trivial Cetys</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/bootstrap-responsive.min.css" rel="stylesheet">
        <script src="js/jquery-1.11.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        
    
        
        <?php
include 'funciones.php';
$conexion = conectaBBDD();
$consulta = $conexion->query("select * from fotos");
  
while ($fila = $consulta->fetch_assoc()) {
     
 
echo '<img src="img/hf'.$fila['id'].'.jpg" width="220" height="320"></img>';
  
  
     
 }
    
    
    

    
        
?>


    </head>
    <body>
        
        



    </body>
</html>