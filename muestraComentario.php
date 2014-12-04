<?php
session_start();
//include 'funciones.php';
//$conexion = conectaBBDD();
$nombreFoto = $_POST['fotografia'];
echo $nombreFoto;
?>
<?php 
                     include 'funciones.php';
                        $conexion = conectaBBDD();
                       // $consulta = $conexion->query("select * from fotosSubidas where usuario = '$contrasena[0]'");
                         $userName = $_SESSION['userName'];
                        $consulta = $conexion->query("select * from comentarios  where foto='$nombreFoto'");
                        //where usuario='$userName
                        ?>
                        
                
                    <div class="row">
                        <table>
                            <tr>'
                        <?php
                        while ($fila = $consulta->fetch_assoc()) {
                            
                        ?>
                       
                                <td><?php echo $fila['usuario'] ?></td>
                                <td><?php echo $fila['comentario'] ?></td>
                           
                        </div>
                        <?php }?>
<!--<div id="muestra">
    <h2>Funciona</h2>
</div>-->