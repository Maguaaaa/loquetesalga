<?php
 //recoge el POST de index.php (el login)
 
//if( (isset($_POST['nombre'])) && ($_POST['nombre'] !== '') ){  
    //convierte a variables
     //      $usuario = $_POST['nombre'];
     //      $pass = $_POST['contrasena'];


         
    echo $nombre;
    echo contrasena;
//Conectamos al servidor.
       $cliente = new SoapClient(null, array('location' => 'http://www.pruebasoap.esy.es/Server.php','uri' => 'urn:webservices', "trace" => 1));
 // llamamos al procedimiento remoto que se nos ha comunicado y le pasamos las variables que queremos y lo metemos en la variable.
   //     $consultar = $cliente ->login($usuario, $pass);
 // El contenido de esta variable lo subdividimos y metemos en la siguiente variable.       
     //   $contrasena = explode("!!!", $consultar);
        
        
        // Login Prueba: JOS.FERNPA@yahoo.com
        // Pass Prueba: 1234
        
        
// Código debug no tocarrr
 //       echo $pass;
//        echo '<br>';
//        echo $contrasena[1];
        
        // si la palabra clave suministrada coincide con la que acabamos de recibir de vuelta para comprobar.
        
  
        // Ya que estamos, saludamos al usuario
     //   echo '<h2>Hola '.$contrasena[0].'</h2>';
//        
//}

?>