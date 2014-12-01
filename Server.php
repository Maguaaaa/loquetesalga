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
    private $_DNI;
    private $_PASS;

    public function login($dni, $pass)
    {
        $conexion = conectaBBDD();
        $this->_DNI = $dni; 
        $this->_PASS = $pass; 
        //consultamos el DNI que pedimos 
        $consulta_usuario= $conexion->query("SELECT * FROM usuarios WHERE email = '$dni'"); 
        $num_filas = mysqli_num_rows ( $consulta_usuario);
        if($dni != "" && $dni != NULL){
            if($pass != "" && $pass != NULL){
              //mandamos de vuelta el nombre y password para que podamos trabajar con ello  
            $fila = $consulta_usuario->fetch_assoc();
            $usuario = $fila['nombre'].'!!!'.$fila['clave'];
            $usuario = strtoupper($usuario);
            }
            
           
            return $usuario;
         
        }
        return $num_filas;
    }
    
    
    
}



$servidor = new SoapServer(null, array('uri' => 'urn:webservices'));

$servidor ->setClass(ServicioDeUsuarios);


$servidor -> handle();
