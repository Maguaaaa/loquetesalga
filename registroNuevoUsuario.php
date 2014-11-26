<?php
 //recoge el POST de index.php (el login)
 
//if( (isset($_POST['nombre'])) && ($_POST['nombre'] !== '') ){  
    //convierte a variables
     //      $usuario = $_POST['nombre'];
     //      $pass = $_POST['contrasena'];

$nombre = $_POST['nombre'];
//echo $nombre;
$apellido = $_POST['apellido'];
//echo $apellido;
$email = $_POST['email'];
//echo $email;
$contrasena = $_POST['contrasena'];
//echo $contrasena;


    
//Conectamos al servidor.
       $cliente = new SoapClient(null, array('location' => 'http://www.pruebasoap.esy.es/ServerCreate.php','uri' => 'urn:webservices', "trace" => 1));
 // llamamos al procedimiento remoto que se nos ha comunicado y le pasamos las variables que queremos y lo metemos en la variable.
        $consultar = $cliente ->login($nombre, $apellido, $email, $contrasena);
 // El contenido de esta variable lo subdividimos y metemos en la siguiente variable.       
     //   
        
     echo $consultar;      
        // Login Prueba: JOS.FERNPA@yahoo.com
        // Pass Prueba: 1234
        
   //   $contrasena = explode("!!!", $consultar);
// Código debug no tocarrr
 //       echo $pass;
//        echo '<br>';
//      echo $contrasena[0];
//       echo $contrasena[1];
//       echo $contrasena[2];
//       echo $contrasena[3];
        
        // si la palabra clave suministrada coincide con la que acabamos de recibir de vuelta para comprobar.
        
  
        // Ya que estamos, saludamos al usuario
     //   echo '<h2>Hola '.$contrasena[0].'</h2>';
//        
//}

?>