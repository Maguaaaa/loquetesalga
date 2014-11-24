<?php
session_start();
session_destroy();
echo 'La sesión ha sido cerrada. <br><br><a href="index.php">Vuelve a la pagina inicio</a>';