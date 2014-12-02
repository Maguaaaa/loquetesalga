<?php
session_start();
$_SESSION = array();
session_destroy();
header( "refresh:2;url=index.php" );
echo 'La sesión ha sido cerrada. <br><br><a href="index.php">Vuelve a la pagina inicio</a>';