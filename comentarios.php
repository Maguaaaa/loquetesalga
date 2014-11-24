<?php

$link = mysql_connect('localhost', 'root', ''); 
if (!$link) { 
    die('No se pudo conectar ' . mysql_error()); 
} 

mysql_select_db(comentarios.sql); 


//////////////////////////////////////////////////////////////////
// si se ha hecho comentario
///////////////////////////////////////////////////////////////////
if (isset($_POST["data"])) {
//kaptxa
$kaptxabien = $_POST['kaptxabien'];
$kaptxa = $_POST['kaptxa'];

    $data = strip_tags($_POST['data'], '<p><a><img><b><br />');
$nombre = strip_tags($_POST['nombre']);
$email = $_POST['email'];
if(validar($data,$nombre, $email,$kaptxa, $kaptxabien)){
         

$comentpadre= strip_tags($_POST['padre']);
$ip = $_SERVER['REMOTE_ADDR'];

$query=mysql_query("insert into ".$tabla."(id,nombre,email,comentario,comentarioip,padre) values('','$nombre','$email','$data','$ip','$comentpadre')");
 
    
    echo "<p class='alert alert-success'>COMENTARIO ENVIADO EXITOSAMENTE!!</p></br> ";
    //email
    email($nombre,$data);
    
    
    }
}  
 
 //////////////////////////////////////////////////////7 
  //final escritura comentario
////////////////////////////////////////////////////

/////////////////////////////////////////////////
//añadir +1
///////////////////////////////////////////////
if (isset($_POST["bien"])) {
$a = $_POST["bien"];
$ip = $_SERVER['REMOTE_ADDR'];
$result = mysql_query("SELECT * FROM $tabla WHERE id= $a", $link)or die(mysql_error());


while($row = mysql_fetch_array($result))
  {
   $biens = $row['bien'];
   $ultimo = $row['bienip'];
  
  }

if ($ip!=$ultimo){
$biens = $biens +1;
$query=mysql_query("UPDATE $tabla SET bien='$biens', bienip='$ip' WHERE id='$a'");
echo "<p class='alert alert-success'>SE HA AÑADIDO TU VALORACIÓN, GRACIAS POR PUNTUAR</p><br />";
}else{
echo "<p class='alert alert-error '>¡¡YA HAS HECHO +1!!</p>";

}
}
////////////////////////////////////////////////7
//añadir -1
////////////////////////////////////////////////
if (isset($_POST["mal"])) {
$a = $_POST["mal"];
$ip = $_SERVER['REMOTE_ADDR'];
$result = mysql_query("SELECT * FROM $tabla WHERE id= $a", $link);


while($row = mysql_fetch_array($result))
  {
   $mals = $row['mal'];
   $ultimo = $row['malip'];
  
  }

if ($ip!=$ultimo){
$mals = $mals -1;
$query=mysql_query("UPDATE $tabla SET mal='$mals', malip='$ip' WHERE id='$a'");
echo "<p class='alert alert-success'>SE HA AÑADIDO TU VALORACIÓN, GRACIAS POR PUNTUAR</p><br />";
}else{
echo "<p class='alert alert-error '>¡¡YA HAS HECHO -1!!</p>";

}
}
///////////////////////////////////////////////////////
//respuesta y monta form
/////////////////////////////////////////////////////7


$result = mysql_query("SELECT id,nombre,comentario,padre,bien,mal  FROM $tabla", $link); 
if (isset($_POST['respuesta'])) {
$idresp= $_POST['respuesta'];

//montar respuestas en la id
while ($row = mysql_fetch_array($result)){ 
$padre = $row['id'];
       if ($row['padre']== 0){
       
       echo '<div class="comentario">
       
<div class="nombre">
'.$row['nombre'].'
</div>
<div class="iruzkin">
'.$row['comentario'].'
</div>
<div class="responder">
<table>


<td><form action="'.$_SERVER['PHP_SELF'].'" method="post" style="margin: 0;">
<input type="hidden" value="'.$row['id'].'" name="bien" />
  <input type="submit" value="'.$row['bien'].'" class="bien" />
  </form></td>
 <td> <form action="'.$_SERVER['PHP_SELF'].'" method="post" style="margin: 0;">
 <input type="hidden" value="'.$row['id'].'" name="mal" />
  <input type="submit" value="'.$row['mal'].'" class="mal" />
  </form></td>
  
<td><form action="'.$_SERVER['PHP_SELF'].'" method="post" style="margin:0;">
 <input type="hidden" value="'.$row['id'].'" name="respuesta" />
  <input type="submit" value="Responder" class="resp" />
  </form>
  </td>
  </tr>
  </table>
</div>
</div>';
//ver si koincide id coment con id ke respondes
            if ($row['id']==$idresp){
           $result2 = mysql_query("SELECT id,nombre,comentario,padre,bien,mal  FROM $tabla", $link);
       while ($raw = mysql_fetch_array($result2)){
       if($raw['padre']== $padre){
            echo '<div class="respuesta">
       
<div class="nombre">
'.$row['nombre'].'
</div>
<div class="iruzkin">
'.$row['comentario'].'
</div>
<div class="responder">
<table>


<td><form action="'.$_SERVER['PHP_SELF'].'" method="post" style="margin: 0;">
<input type="hidden" value="'.$raw['id'].'" name="bien" />
  <input type="submit" value="'.$raw['bien'].'" class="bien" />
  </form></td>
 <td> <form action="'.$_SERVER['PHP_SELF'].'" method="post" style="margin: 0;">
 <input type="hidden" value="'.$raw['id'].'" name="mal" />
  <input type="submit" value="'.$raw['mal'].'" class="mal" />
  </form></td>
  
  </tr>
  </table>
</div>
</div>';

       }//if comprobacion
       
       }//while respuestas
           imprimir_form($idresp);
} 
////////////////////////////////////////////////////////
//no es respuesta
////////////////////////////////////////////////////////
}else{
$result2 = mysql_query("SELECT id,nombre,comentario,padre,bien,mal  FROM $tabla", $link);
       while ($raw = mysql_fetch_array($result2)){
       if($raw['padre']== $padre){
      echo '<div class="respuesta">
       
<div class="nombre">
'.$row['nombre'].'
</div>
<div class="iruzkin">
'.$row['comentario'].'
</div>
<div class="responder">
<table>


<td><form action="'.$_SERVER['PHP_SELF'].'" method="post" style="margin: 0;">
<input type="hidden" value="'.$raw['id'].'" name="bien" />
  <input type="submit" value="'.$raw['bien'].'" class="bien" />
  </form></td>
 <td> <form action="'.$_SERVER['PHP_SELF'].'" method="post" style="margin: 0;">
 <input type="hidden" value="'.$raw['id'].'" name="mal" />
  <input type="submit" value="'.$raw['mal'].'" class="mal" />
  </form></td>
  
  </tr>
  </table>
</div>
</div>';

       }//if comprobacion
       
       }//while respuestas

       }//no es respuesta

} //cierra while grande
 
}else{

while ($row = mysql_fetch_array($result)){ 
$padre = $row['id'];
       if ($row['padre']== 0){
       
              echo '<div class="comentario">
       
<div class="nombre">
'.$row['nombre'].'
</div>
<div class="iruzkin">
'.$row['comentario'].'
</div>
<div class="responder">
<table>


<td><form action="'.$_SERVER['PHP_SELF'].'" method="post" style="margin: 0;">
<input type="hidden" value="'.$row['id'].'" name="bien" />
  <input type="submit" value="'.$row['bien'].'" class="bien" />
  </form></td>
 <td> <form action="'.$_SERVER['PHP_SELF'].'" method="post" style="margin: 0;">
 <input type="hidden" value="'.$row['id'].'" name="mal" />
  <input type="submit" value="'.$row['mal'].'" class="mal" />
  </form></td>
  
<td><form action="'.$_SERVER['PHP_SELF'].'" method="post" style="margin:0;">
 <input type="hidden" value="'.$row['id'].'" name="respuesta" />
  <input type="submit" value="Responder" class="resp" />
  </form>
  </td>
  </tr>
  </table>
</div>
</div>';

$result2 = mysql_query("SELECT id,nombre,comentario,padre,bien,mal  FROM $tabla", $link);
       while ($raw = mysql_fetch_array($result2)){
       if($raw['padre']== $padre){
     echo '<div class="respuesta">
       
<div class="nombre">
'.$raw['nombre'].'
</div>
<div class="iruzkin">
'.$raw['comentario'].'
</div>
<div class="responder">
<table>


<td><form action="'.$_SERVER['PHP_SELF'].'" method="post" style="margin: 0;">
<input type="hidden" value="'.$raw['id'].'" name="bien" />
  <input type="submit" value="'.$raw['bien'].'" class="bien" />
  </form></td>
 <td> <form action="'.$_SERVER['PHP_SELF'].'" method="post" style="margin: 0;">
 <input type="hidden" value="'.$raw['id'].'" name="mal" />
  <input type="submit" value="'.$raw['mal'].'" class="mal" />
  </form></td>
  
  </tr>
  </table>
</div>
</div>';

       }//if comprobacion
       }//while respuestas
       }//no es respuesta
       
} //cierra while grande
imprimir_form(0);
}//get respuesta


  
 function imprimir_form($padree)
 {
 $cap1 = rand(0,20);
$cap2 = rand(0,10);
//form bidali

echo "<br /><div class='well'><form class='form-horizontal' action='" . $_SERVER['PHP_SELF'] . "' method='post'>\n";
echo 'NOMBRE: <input type="text" name="nombre" placeholder="Tu nombre"><font color="red">*Obligatorio</font><br />';
echo 'EMAIL: <input type="text" name="email" placeholder="Tu EMAIL"> <font color="red">*No necesario, no se mostrará y solo se utilizará para notificarte de nuevas respuestas</font><br /><br />';
echo 'COMENTARIO: <font color="blue">*Se pueden utilizar las etiquetas HTML &lt;p&gt;, &lt;a&gt;, &lt;img&gt;, &lt;b&gt;, &lt;br /&gt;</font> </br><textarea class="field span10" name="data" rows="6" placeholder="Tu comentario. 1 comentario= 1 gracias"></textarea></br>';
$final = $cap1+$cap2;
echo 'HAZ LA SUMA:<font color="red">*Obligatorio</font></br>';
print $cap1.'+'.$cap2.'=';

print '<input type="hidden" value="'.$padree.'" name="padre" >';
print '<input type="text" name="kaptxa" maxlength="2" size="4">';
print '<input type="hidden" value="'.$final.'" name="kaptxabien" >';

echo '<input type="submit" class="btn btn-default" value="ENVIAR COMENTARIO"></form>';
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//NO BORRAR ESTA LINEA
echo '<a href="http://www.euskoware.com/php/sistema-comentarios-mysql/">¿quieres este sistema de comentarios para tu web?</a></div><br />';
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//anunzio


}
function validar($coment, $nom ,$mail, $kap, $kapbien){ 
//validar($data,$nombre, $email,$kaptxa, $kaptxabien))
if ($kapbien != $kap){
echo "<p class='alert alert-error '>KAPTXA INCORRECTO</p>";
return FALSE;
}

if(empty($nom)){
echo "<p class='alert alert-error '>FALTA EL NOMBRE, ESCRIBE UNO.</p>";
return FALSE;
 }
if(empty($coment)){

echo "<p class='alert alert-error '>FALTA EL COMENTARIO, ESCRIBE UNO.</p>";
return FALSE;
}
if(!empty($mail)){
  if (!filter_var($mail, FILTER_VALIDATE_EMAIL)){ 
  echo "<p class='alert alert-error '>FORMATO DE EMAIL INCORRECTO</p>";
      return FALSE; 
  } else { 
       return TRUE; 
  } 
 }else{
 return TRUE;
 
 }
 

}  
////////////////////////////////////////////////
//mandar email
////////////////////////////////////////////////
function email($n,$c){



    $to = 'TU CORREO';
     
    $asunto = 'Nuevas interacciones en '.$_SERVER['PHP_SELF'];
     
    $headers = "From: UN CORREO \r\n";
    $headers .= "Reply-To: CORREO PARA RESPONDER \r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
$html= '<html><body>
<img src="http://www.euskoware.com/opinion/euskoware.jpg" alt="Logotipo" />
<p><b>
NUEVAS INTERACCIONES EN '.$_SERVER['PHP_SELF'].'
</b></p>
<p><b>ha comentado:</b> <br />
'.$n.'
<b>comentario: </b><br />
'.$c.'

<img src="http://www.euskoware.com/opinion/euskoware2.jpg" alt="PIE" />


</body></html>';

mail($to, $asunto, $html, $headers); 

}


?>

