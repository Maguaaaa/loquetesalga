<?php
?>

<div id="miFotos" class="col-lg-10 col-lg-offset-1 text-center hidden" >
                    <h2>Imagenes que has subido tu, persona molona</h2>
                    
                    <hr>
                     <?php 
                     include 'funciones.php';
                        $conexion = conectaBBDD();
                        $consulta = $conexion->query("select * from fotosSubidas ORDER BY rand() LIMIT 8");
                        ?>
                        
                
                    <div class="row">
                        <?php
                        while ($fila = $consulta->fetch_assoc()) {
                        ?>
                        <div class="col-md-3">
                            <legend><?php echo $fila['nombre'] ?></legend>
                            <div class="portfolio-item">
                                
                                <a href="#img">
                                    <img height="150" width="150" class="img-portfolio img-responsive " onclick="cargafoto('<?php echo $fila['nombre']?>','<?php echo $fila['usuario']; ?>','<?php echo $fila['ruta']?>')" src="img/<?php echo $fila['ruta']?>">
                                </a>
                            </div>
                        </div>
                        <?php }?>
                    <!-- /.row (nested) -->
<!--                    <a href="#" class="btn btn-dark">Mas Fotos</a>
                    <a href="#services" class="btn btn-dark"onclick="sube()" >Subir imagen</a>-->
                   
                </div>
                <!-- /.col-lg-10 -->
                <a href="#loMio" class="btn btn-dark" onclick="quitaLoMio()">Volver</a>
                <br>
                   <script>
                   function quitaLoMio(){
                $('#miFotos').addClass('hidden');
                $('#portfolio').removeClass('hidden');
    }
                   </script>
            </div>