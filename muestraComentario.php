<?php
session_start();
//include 'funciones.php';
//$conexion = conectaBBDD();
$nombreFoto = $_POST['fotografia'];
//echo $nombreFoto;
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
                        <table  class='table table-hover'>
                            <font color='red'>
                            
                            
                        <?php
                        while ($fila = $consulta->fetch_assoc()) {
                            
                        ?>
                            <tr>
                            <td><font color="black"><?php echo $fila['usuario'] ?></font><font color="black"></td>
                                
                                <td><font color="black"><?php echo $fila['comentario'] ?><font color="black"></td>
                                
                            </tr>
                        <?php }?>
                                </table>
<!--<div id="muestra">
    <h2>Funciona</h2>
</div>-->