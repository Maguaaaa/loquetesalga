<?php
?>

<div class="col-lg-10 col-lg-offset-1 text-center">
                    <h2>Imagenes que nos ha subido gente guay...</h2>
                    
                    <hr>
                     <?php 
                     include 'funciones.php';
                        $conexion = conectaBBDD();
                        $consulta = $conexion->query("select * from fotosSubidas ORDER BY rand() LIMIT 4");
                        ?>
                        
                
                    <div class="row">
                        <?php
                        while ($fila = $consulta->fetch_assoc()) {
                        ?>
                        <div class="col-md-6">
                            <legend><?php echo $fila['nombre'] ?></legend>
                            <div class="portfolio-item">
                                
                                <a href="#img">
                                    <img class="img-portfolio img-responsive " onclick="cargafoto('<?php echo $fila['nombre']?>','<?php echo $fila['usuario']; ?>','<?php echo $fila['ruta']?>')" src="img/<?php echo $fila['ruta']?>">
                                </a>
                            </div>
                        </div>
                        <?php }?>
                    <!-- /.row (nested) -->
<!--                    <a href="#" class="btn btn-dark">Mas Fotos</a>
                    <a href="#services" class="btn btn-dark"onclick="sube()" >Subir imagen</a>-->
                   
                </div>
                <!-- /.col-lg-10 -->
            </div>