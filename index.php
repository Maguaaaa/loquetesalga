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
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
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
        
        
        // Login Prueba: JOS.FERNPA@yahoo.com
        // Pass Prueba: 1234
        
        
// Código debug no tocarrr
//        echo $pass;
//        echo '<br>';
//        echo $contrasena[1];
        
        // si la palabra clave suministrada coincide con la que acabamos de recibir de vuelta para comprobar.
        if($pass === $contrasena[1]){
  
        // Ya que estamos, saludamos al usuario
     //   echo '<h2>Hola '.$contrasena[0].'</h2>';
//        
            ?>
 <script>
$(document).ready(function(){
$('#login_usuario').remove();
$('#fotos').removeClass('hidden');
$('#top').remove();
$('#about').remove();//eliminamos la seccion del principio
$('#barra').removeClass('hidden');
});

  

 </script>

 <?php
 
 
 
//echo '<div style="width:40%; margin-left:30%; margin-right:30%">';
//echo '<h1>Hola '.$contrasena[0].'</h1>';
//echo '</div>';
//        
//echo 'Esto confirma el correcto funcionamiento';
//echo '<p></p>';

//echo "<a ";
//echo 'href="logout.php"';
//echo '>Pulse aqui para arrancar sesión</a>';
        // Si no coincide, mandamos al visitante de vuelta.
        }else {
echo '<script>';
echo 'alert("Introduzca un usuario y/o contraseña válido");';                
echo 'location.href = "index.php";';                
echo '</script>';      
    }
     }
     
        ?>

    <!-- Navigation -->
    <a id="menu-toggle" href="#" class="btn btn-dark btn-lg toggle"><i class="fa fa-bars"></i></a>
    <nav id="sidebar-wrapper">
        <ul class="sidebar-nav">
            <a id="menu-close" href="#" class="btn btn-light btn-lg pull-right toggle"><i class="fa fa-times"></i></a>
            <li class="sidebar-brand">
                <a href="#top"><?php if(isset($contrasena[1])){
                    echo $contrasena[0];
                    echo '<li>
                <a onclick="cierra()" href="index.php">Log Out</a><!--Log Out-->
                
            </li>';
                }else{echo 'Introduce tus datos';}?></a><!--Nombre usuario-->
                
            </li>
<!--            <li>
                <a href="#top">Home</a>
            </li>
            <li>
                <a href="#about">About</a>
            </li>
            <li>
                <a href="#services">Services</a>
            </li>-->
            <li>
               <!-- <a href="#portfolio">Log Out</a><!--Log Out-->
                
            </li>
<!--            <li>
                <a href="#contact">Contact</a>
            </li>-->
        </ul>
    </nav>
    
 
    <!-- Header -->
    <header id="top" class="header">
        <div id="cosa"class="text-vertical-center">
            <h1>Lo Que Te Salga</h1>
            <h3>Fotos,Momentos,Ilusiones</h3>
            <br>
            <a href="#about" class="btn btn-dark btn-lg">Comenzar!</a>
        </div>
    </header>

    <!-- About -->
    <section id="about" class="about">
        <div class="container">
             
             <div class="row">
                <div class="col-lg-12 text-center">
<!--                    <h2>Stylish Portfolio is the perfect theme for your next project!</h2>
                    <p class="lead">This theme features some wonderful photography courtesy of <a target="_blank" href="http://join.deathtothestockphoto.com/">Death to the Stock Photo</a>.</p>-->

<fieldset>

      <div id="login_usuario">                      
<form class="form-inline" role="form" action="index.php" method="post">
  <div class="form-group">
    <div class="input-group">
      <label class="sr-only" for="exampleInputEmail2">Email</label>
      <div class="input-group-addon">@</div>
      <input type="email" class="form-control" id="exampleInputEmail2" name="usuario" placeholder="Email">
    </div>
  </div>
  <div class="form-group">
      <div class="input-group">
    <label class="sr-only" for="exampleInputPassword2">Contraseña</label>
    <div class="input-group-addon">*</div>
    <input type="password" class="form-control" id="exampleInputPassword2" name="pass"  placeholder="Contraseña">
  </div>
  </div>
  <div class="checkbox">
    <label>
      <input type="checkbox"> Remember me
    </label>
  </div>
  <button type="submit" class="btn btn-dark">Entrar</button>
  <h5>¿Aún sin cuenta?</h5><a href="#img"><h5 class="btn btn-link" onclick="registro()">Registrate</h5></a>
</form>
</div>
</fieldset>

                </div>
            </div>
            <!-- /.row -->
             
        </div>
        <!-- /.container -->
    </section>
    <div id="barra" class="hidden">
        <nav class="navbar  navbar-inverse navbar-custom  top-nav-collapse" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top">
                    <i class="fa fa-photo"></i>  <span class="light">Lo Que</span> Te Salga
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
                <ul class="nav navbar-nav">
                    <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                    <li class="hidden active">
                        <a href="#page-top"></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#about">About</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#download">Download</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#contact">Contact</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
    </div>

<!--     Services 
     The circle icons use Font Awesome's stacked icon classes. For more information, visit http://fontawesome.io/examples/ 
    <section id="services" class="services bg-primary">
        <div class="container">
            <div class="row text-center">
                <div class="col-lg-10 col-lg-offset-1">
                    <h2>Our Services</h2>
                    <hr class="small">
                    <div class="row">
                        <div class="col-md-3 col-sm-6">
                            <div class="service-item">
                                <span class="fa-stack fa-4x">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-cloud fa-stack-1x text-primary"></i>
                            </span>
                                <h4>
                                    <strong>Service Name</strong>
                                </h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                <a href="#" class="btn btn-light">Learn More</a>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="service-item">
                                <span class="fa-stack fa-4x">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-compass fa-stack-1x text-primary"></i>
                            </span>
                                <h4>
                                    <strong>Service Name</strong>
                                </h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                <a href="#" class="btn btn-light">Learn More</a>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="service-item">
                                <span class="fa-stack fa-4x">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-flask fa-stack-1x text-primary"></i>
                            </span>
                                <h4>
                                    <strong>Service Name</strong>
                                </h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                <a href="#" class="btn btn-light">Learn More</a>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="service-item">
                                <span class="fa-stack fa-4x">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-shield fa-stack-1x text-primary"></i>
                            </span>
                                <h4>
                                    <strong>Service Name</strong>
                                </h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                <a href="#" class="btn btn-light">Learn More</a>
                            </div>
                        </div>
                    </div>
                     /.row (nested) 
                </div>
                 /.col-lg-10 
            </div>
             /.row 
        </div>
         /.container 
    </section>-->

    <!-- Callout -->
<!--    <aside  class="callout hidden">
        <div class="text-vertical-center">
            <h1>Vertically Centered Text</h1>
        </div>
    </aside>-->

    <!-- Portfolio   Aqui van a aparecer las iamgenes que van a ir saliendo -->
    <section id="portfolio" class="portfolio">
        <div  class="container"> <!-- AQUI SE ENSEÑAN LAS FOTOS-->
            <div id="fotos" class="row hidden ">
                <div class="col-lg-10 col-lg-offset-1 text-center">
                    <h2>Imagenes Compartidas</h2>
                    
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="portfolio-item">
                                <a href="#img">
                                    <img class="img-portfolio img-responsive btn" onclick="cargafoto(1)" src="img/portfolio-1.jpg">
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="portfolio-item">
                                <a href="#">
                                    <img class="img-portfolio img-responsive" src="img/portfolio-2.jpg">
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="portfolio-item">
                                <a href="#">
                                    <img class="img-portfolio img-responsive" src="img/portfolio-3.jpg">
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="portfolio-item">
                                <a href="#">
                                    <img class="img-portfolio img-responsive" src="img/portfolio-4.jpg">
                                </a>
                            </div>
                        </div>
                         <div class="col-md-6">
                            <div class="portfolio-item">
                                <a href="#">
                                    <img class="img-portfolio img-responsive" src="img/portfolio-1.jpg">
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="portfolio-item">
                                <a href="#">
                                    <img class="img-portfolio img-responsive" src="img/portfolio-2.jpg">
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="portfolio-item">
                                <a href="#">
                                    <img class="img-portfolio img-responsive" src="img/portfolio-3.jpg">
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="portfolio-item">
                                <a href="#">
                                    <img class="img-portfolio img-responsive" src="img/portfolio-4.jpg">
                                </a>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <!-- /.row (nested) -->
                    <a href="#" class="btn btn-dark">View More Items</a>
                </div>
                <!-- /.col-lg-10 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>
    <hr>
    <!-- Call to Action -->
    <!--Cuando pinchamos una foto se carga awui -->
   <aside id="img" class="call-to-action bg-primary hidden">
        <div class="container">
            <div id="detalle" class="row hidden">
                
            </div>
            
        </div>
    </aside>
    <hr>



    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-lg-offset-1 text-center">
                    <h4><strong>Lo Que Te Salga</strong>
                    </h4>
                    <p>3481 Melrose Place<br>Beverly Hills, CA 90210</p>
                    <ul class="list-unstyled">
                        
                        <li><i class="fa fa-envelope-o fa-fw"></i>  <a href="mailto:name@example.com">name@example.com</a>
                        </li>
                    </ul>
                    <br>
                    <ul class="list-inline">
                        <li>
                            <a href="#"><i class="fa fa-facebook fa-fw fa-3x"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-twitter fa-fw fa-3x"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-dribbble fa-fw fa-3x"></i></a>
                        </li>
                    </ul>
                    <hr class="small">
                    <p class="text-muted">Copyright &copy; Lo Que Te Salga 2014</p>
                      <div id="contenedor">
            
        </div>
                </div>
            </div>
        </div>
        
      
    </footer>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    
    
    <!-- Custom Theme JavaScript -->
    <script>
    // Closes the sidebar menu
    $("#menu-close").click(function(e) {
        e.preventDefault();
        $("#sidebar-wrapper").toggleClass("active");
    });

    // Opens the sidebar menu
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#sidebar-wrapper").toggleClass("active");
    });

        function cargafoto(){
            $("#img").removeClass("hidden");
            $("#detalle").removeClass("hidden");
            $("#detalle").html('<div class="col-lg-6"><img class="img-portfolio img-thumbnail img-responsive"  src="img/portfolio-1.jpg"></div>\n\
        <div class="col-lg-4"><h2>Titulo</h2><h3>Usuario</h3><h3>Usuario</h3></div><div class="col-lg-2"><h2 class="btn btn-dark" onclick="comentar()">Comentar</h2></div>');
        }

    // Scrolls to the selected menu item on the page
    $(function() {
        $('a[href*=#]:not([href=#])').click(function() {
            if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') || location.hostname == this.hostname) {

                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                if (target.length) {
                    $('html,body').animate({
                        scrollTop: target.offset().top
                    }, 1000);
                    return false;
                }
            }
        });
    });
    
    function registro(){
        $("#img").removeClass("hidden");
        $("#detalle").removeClass("hidden");
      $("#detalle").html('<div class="col-lg-2"></div><div class="col-lg-8"><legend>Registrate</legend><form class="registerForm" method="post">\n\
       <div class="form-group"><label>Nombre</label><div class="input-prepend"><span class="add-on">\n\
       </span><input id="nombre" placeholder="Nombre" type="text" class="form-control input-xlarge" name="nombre" />\n\
      </div></div><div class="form-group"><label>Apellido</label><div class="input-prepend">\n\
      <span class="add-on"></span><input id="apellido" placeholder="Apellido" type="text" class="form-control input-xlarge" name="apellido" />\n\
      </div></div><div class="form-group"><label>Email</label><div class="input-prepend"><span class="add-on"></span>\n\
      <input id="email" placeholder="Email" type="email" class="form-control input-xlarge" name="email" /></div></div><div class="form-group"><label>Contraseña</label>\n\
      <div class="input-prepend"><span class="add-on"></span><input type="password" id="contrasena" placeholder="Contraseña" type="text" class="form-control input-xlarge" name="contrasena" />\n\
      </div></div></form><h2 id="enviaDatos" onclick="enviaDatos()" class="btn btn-dark">Enviar</i></h2><hr><br></div>');
        
    }
 
 function enviaDatos(){
                var _nombre = $('#nombre').val();
                var _apellido = $('#apellido').val();
                var _email= $('#email').val();
                var _contrasena = $('#contrasena').val();
     $('body').load("registroNuevoUsuario.php",{
                    nombre: _nombre,
                    apellido: _apellido,
                    email: _email,
                    contrasena: _contrasena
        }); 
 }
 
function comentar(){
        $("#detalle").html('<div class="col-lg-4"></div><div class="col-lg-4"> <legend>Usuario</legend> <input id = "usuario" type="text" class="form-control " disabled name="usuario" placeholder="<?php if(isset($contrasena[1])){echo $contrasena[0];} ?>" /><br><legend>Comentario</legend><textarea class="form-control" rows="3"></textarea><h2 class="btn btn-dark" onclick="enviaComent()">Enviar</h2></div><div class="col-lg-1"><a href="#portfolio"><h2 class="btn btn-xs btn-danger " onclick="cierraComent()">Cerrar</h2></a>');
    }
    
    function enviaComent(){
        //FUNCION PARA QUE SE ENVIE EL COMENTARIO A LA BASE DE DATOS
    }
    
            
            function cierra(){//El log Out
                session_destroy();
            } 
            
            function  cierraComent(){
                $('#detalle').addClass('hidden');
                $('#img').addClass('hidden');
            }
            
    </script>

</body>

</html>

