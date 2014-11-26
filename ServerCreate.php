<?php
function conectaBBDD(){
    //AQUI CAMBIAS LA CONFIGURACIÓN y pones la de tu servidor de Hostinger
    
    //Nombre de base de datos MySQL  en Hostinger
    $BBDD = 'u682588588_soap';
    
    //Usuario MySQL de Hostinger
    $usuario_mysql_hostinger = 'u682588588_soap';
    
    //contraseña de mysql
    $pass = 'thomas82';
    
 $conexion = new mysqli('localhost', $usuario_mysql_hostinger, $pass, $BBDD);
 $consulta = $conexion ->query("SET NAMES UTF8");
 return $conexion;   
}

class ServicioDeUsuarios
{
    private $_NOMBRE;
    private $_APELLIDO;
    private $_EMAIL;
    private $_CONTRASENA;
    

    public function login($nombre, $apellido, $email, $contrasena)
    {
        $conexion = conectaBBDD();
        $this->_NOMBRE = $nombre; 
        $this->_APELLIDO = $apellido;
        $this->_EMAIL = $email;
        $this->_CONTRASENA = $contrasena; 
        
        
        //consultamos el DNI que pedimos 
//        $consulta_usuario= $conexion->query("INSERT INTO `usuarios`(`nombre`, `apellido`, `email`, `clave`) VALUES ('test1','test2','test3','test4')");
        $consulta_usuario= $conexion->query("INSERT INTO `usuarios`(`nombre`, `apellido`, `email`, `clave`) VALUES ('$nombre','$apellido','$email','$contrasena')");
        $num_filas = mysqli_num_rows ( $consulta_usuario);
//        if($nombre != "" && $nombre != NULL){
//            if($contrasena != "" && $contrasena != NULL){
//              //mandamos de vuelta el nombre y password para que podamos trabajar con ello  
//            $fila = $consulta_usuario->fetch_assoc();
//            $usuario = $fila['nombre'].'!!!'.$fila['clave'].'!!!'.$fila['email'].'!!!'.$fila['apellidos'];
//            }
            
           
     //       return $usuario;
         
        }
    //    return $num_filas;
    }
    
    
    
//}



$servidor = new SoapServer(null, array('uri' => 'urn:webservices'));

$servidor ->setClass(ServicioDeUsuarios);


$servidor -> handle();
