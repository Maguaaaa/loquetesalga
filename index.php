<!DOCTYPE html>

<html>
    <head>
<meta charset="UTF-8">
        <title>Trivial Cetys</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/bootstrap-responsive.min.css" rel="stylesheet">
        <script src="js/jquery-1.11.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        
    </head>
    
    <body style="background-color: #6666ff">
        
        
         <?php
 //recoge el POST de index.php (el login)
 
if( (isset($_POST['usuario'])) && ($_POST['usuario'] !== '') ){  
    //convierte a variables
           $usuario = $_POST['usuario'];
           $pass = $_POST['pass'];
//Conectamos al servidor.
        $cliente = new SoapClient(null, array('location' => 'http://www.pruebasoap.esy.es/Server.php','uri' => 'urn:webservices', "trace" => 1));
 // llamamos al procedimiento remoto que se nos ha comunicado y le pasamos las variables que queremos y lo metemos en la variable.
        $consultar = $cliente ->login($usuario, $pass);
 // El contenido de esta variable lo subdividimos y metemos en la siguiente variable.       
        $contrasena = explode("!!!", $consultar);
        
// Código debug no tocarrr
//        echo $pass;
//        echo '<br>';
//        echo $contrasena[1];
        
        // si la palabra clave suministrada coincide con la que acabamos de recibir de vuelta para comprobar.
        if($pass === $contrasena[1]){
        echo '<div style="width:40%; margin-left:30%; margin-right:30%">';
        // Ya que estamos, saludamos al usuario
        echo '<h2>Hola '.$contrasena[0].'</h2>';
//        
 echo "<script language='javascript' type='text/javascript'>";
echo "$(document).ready(function(){";
echo "$('#login_usuario').remove();";
echo "});";
 echo "</script>";

        
echo 'Esto confirma el correcto funcionamiento';


        // Si no coincide, mandamos al visitante de vuelta.
        }else {
echo '<script>';
echo 'alert("Introduzca un usuario y/o contraseña válido");';                
echo 'location.href = "index.php";';                
echo '</script>';      
    }
     }
     
        ?>
    
        
     <div class="container-fluid" style="margin-left: 30%;margin-right: 20%; margin-top: 5%">
    <div class="row-fluid" style="margin-top: 5%; margin-bottom: 5%">
           
        <div id="login_usuario"class="span3">
                    <form action="index.php" class="form-horizontal" method="post">
                        <fieldset>
                            <legend>Bienvenido a LoQueTeSalga</legend>
                            
                            <div class="control-group">
                                <label class="control-label">Usuario <span class="add-on"><i class="icon-envelope"></i></span></label>
                                <div class="controls">
                                  <input type="text" name="usuario" placeholder="usuario">
                                </div>
                            </div>
                            
                            <div class="control-group">
                                <label class="control-label">Contraseña <span class="add-on"><i class="fa fa-file-archive-o"></i></span></label>
                                <div class="controls">
                                    
                                  <input type="password" name="pass" placeholder="contraseña">
                                </div>
                            </div>
                            
                            <div class="control-group">
                                <div class="controls">
                                  
                                  <button type="submit" class="btn">Sign in</button>
                                </div>
                            </div>
                        </fieldset>
                        </form>
        </div>
        
       </div> 
        
       </div> 
        
       
    </body>
</html>