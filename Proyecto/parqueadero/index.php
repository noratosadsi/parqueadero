<?php include 'controlador/control.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>NORATOS PARKING</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="vista/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
<script src="vista/bootstrap/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<style type="text/css">

.inputcentrado {
   text-align: center;
   font-size: 18px;
   background-color: #E9E9E9;
   }
</style>

</head>
<em><strong>
<body background="vista/imagenes/tecnol.jpg">

//nuevo para alertas
<?php echo "<div class='container'>
<div class='alert alert-success alert-dismissible' id='myAlert'>
<a href='' class='close'>&times;</a>
<strong>Success!</strong> This alert box could indicate a successful or positive action.
</div>
</div>"
?>

<script>
$(document).ready(function(){
    $(".close").click(function(){
        $("#myAlert").alert("close");
    });
});
</script>

<div class="container">
<header>
<?php include_once 'vista/header.php'; ?>

<div class="panel panel-default"> 
<!-- contenedor del titulo--> 

<div class="panel-body">


<!-- Contenedor ejercicio--> 
<div class="panel panel-body"> 
<div class="row alert-primary"> <!-- Color fondo general--> 
<div class="col-sm-12 col-md-12"> 

<form name="form1" method="post" action="form1.php">
<div class="panel-heading"> 
        
<table border="0" align="center">
<tr>
<?php if(isset($_REQUEST['dato1'])){ echo "<td colspan='6' align='center'>
<div class='alert alert-info'>"."REGISTRADO CORRECTAMENTE"."</div>";} 
if(isset($_REQUEST['dato'])){ echo "<td colspan='6' align='center'>
<div class='alert alert-danger'>"."Número de cédula ya se encuentra registrado"."</div>";}
if(isset($_REQUEST['error'])){ echo "<td colspan='6' align='center'>
<div class='alert alert-danger' name='error'> $_REQUEST[error] </div>";}
if(isset($_REQUEST['error2'])){ echo "<td colspan='6' align='center'>
<div class='alert alert-danger' name='error'> Ingreso no válido </div>";}
?>
</td></tr>
 
<tr> 

<td align="center" style="width:70%" bgcolor="white">
<h2 align="center">NORATO'S PARKING</h2> 
</td>

<td align="center" bgcolor="white" valign="center" style="width:10%; font-size:20px">
FECHA Y HORA</td>

<td align="center" bgcolor="white">
<script type="text/javascript">
function startTime(){
today=new Date();
h=today.getHours();
m=today.getMinutes();
s=today.getSeconds();
m=checkTime(m);
s=checkTime(s);
document.getElementById('reloj').innerHTML=h+":"+m+":"+s+"<br>"+fecha;
t=setTimeout('startTime()',500);}
function checkTime(i)
{if (i<10) {i="0" + i;}return i;}
window.onload=function(){startTime();}
</script>

<div id="reloj" style="font-size:20px"></div>
<script type="text/javascript">
//<![CDATA[
var date = new Date();
var d  = date.getDate();
var day = (d < 10) ? '0' + d : d;
var m = date.getMonth() + 1;
var month = (m < 10) ? '0' + m : m;
var yy = date.getYear();
var year = (yy < 1000) ? yy + 1900 : yy;
var fecha=(day + "/" + month + "/" + year);
//]]>
</script>
</td>
</tr>
</table>
</div>

<?php include 'modelo/config.php';?>
<?php include "modelo/cupos.php";?>


<table border="0" width="95%" class="alert alert-primary" align="center" Style="font-family: Arial; font-size: 10pt;"> 
<tr align="center">
<td>Cedula</td>
<td>&nbsp;&nbsp;<input title="Se necesita un nombre" type="text" name="cedulaactualizar" >&nbsp;&nbsp;</td>
<td rowspan="2" valign="center">
<button type="submit" class="btn btn-primary btn-sm">
<span class="glyphicon glyphicon-refresh"></span>&nbsp;Validar</button></td>
<td>Placa o Matricula</td>
<td>&nbsp;&nbsp;<input type="text" name="matricula" disabled>&nbsp;&nbsp;</td>
<td>Fecha y hora de ingreso</td>
<td>&nbsp;&nbsp;<input disabled type="datetime" value="">&nbsp;&nbsp;</td>
</tr>

<tr align="center">
<td>Nombres</td>
<td>&nbsp;&nbsp;<input type="text" name="nombre" disabled>&nbsp;&nbsp;</td>
<td>Marca</td>
<td>&nbsp;&nbsp;<input type="text" name="marca" disabled>&nbsp;&nbsp;</td>
<td>Fecha y hora de salida</td>
<td>&nbsp;&nbsp;<input disabled type="datetime" value="" name="fecha_hora">&nbsp;&nbsp;</td>
</tr>

<tr align="center">
<td>Apellidos</td>
<td>&nbsp;&nbsp;<input type="text" name="apellido" disabled>&nbsp;&nbsp;</td>
<td></td>
<td>Modelo</td>
<td>&nbsp;&nbsp;<input type="text" name="modelo" disabled>&nbsp;&nbsp;</td>
<td>Tiempo de permanencia</td>
<td>&nbsp;&nbsp;<input type="text" disabled>&nbsp;&nbsp;</td>
</tr>

<tr align="center">
<td>Telefono 1</td>
<td>&nbsp;&nbsp;<input type="text" name="telefono1" disabled>&nbsp;&nbsp;</td>
<td></td>
<td>Tipo</td>
<td>&nbsp;&nbsp;<select name="tipo" disabled>
<option value="moto">Moto</option>
<option value="bicicleta">Bicicleta</option>
</select>&nbsp;&nbsp;</td>
<td>Precio</td>
<td>&nbsp;&nbsp;<input type="text" disabled>&nbsp;&nbsp;</td>
</tr>

<tr align="center">
<td>Telefono 2</td>
<td>&nbsp;&nbsp;<input type="text" name="telefono2" disabled>&nbsp;&nbsp;</td>
<td></td>
<td>Descripcion / Observacion</td>
<td>&nbsp;&nbsp;<input type="text" name="descripcion" disabled>&nbsp;&nbsp;</td>
<td>IVA</td>
<td>&nbsp;&nbsp;<input type="text" disabled>&nbsp;&nbsp;</td>
</tr>
</table>


<table border="0" align="center" class="alert alert-default"> 
	<script>
		var color1="";
		var color2="";
		function change (elemento) {
			if(color1=="yellow")
			{
				elemento.style.backgroundColor=color1="#fff";
			}else{
				elemento.style.backgroundColor=color1="gray";
			}
		}
		function change2 (elemento) {
			if(color2=="yellow")
			{
				elemento.style.backgroundColor=color2="#fff";
			}else{
				elemento.style.backgroundColor=color2="yellow";
			}
		}
		
function sub(a){
 a=a-1;
  seleccion = document.getElementsByName("posicion")[a].value;
  document.getElementsByName("lugar")[0].value = seleccion;
   seleccion = document.getElementsByName("posicion")[a].value;
  document.getElementsByName("lugar2")[0].value = seleccion;

/*  alert(+seleccion);*/

};

	</script>

<tr>
<td colspan="10" align="center" class="panel panel-default">ESTACIONAMIENTOS</td>
</tr>
<tr>
<td colspan="5" align="center" class="panel panel-default">MOTOS</td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td colspan="5" align="center" class="panel panel-default">BICICLETAS</td>
</tr>
<tr>
<td colspan="5">



<?php

//consulta si está estacionado



		$m=$cup["motos"];//Cantidad de parqueaderos disponibles
		
		$x=0;
		echo "<table border='0' Style='font-family: Arial; font-size: 9pt; color:black'>";
		echo "<tr align='center'>";
		
		
		for ($i = 1; $i <= $m; $i++) 
		{
			$x=$x+1;
			
			if ($verificar=$estacionado->num_rows)
			{
				$usar="";
			}	
			else
			{
				$usar="onclick='sub($i);change(this);'";
			}			
			
			if (in_array($i, $estmoto))
			{
				echo "<td align='center' style='width:30px'>";
			    echo "<input type='submit' name='posicion' $usar style='width:30px; background-color:gray' value='$i'></td>";	
			}
			else
			{
				echo "<td align='center' style='width:30px'>";
			    echo "<input type='button' name='posicion' style='width:30px' value='$i'></td>";	
			}
			
			
		if ($x==15) {
			echo "</tr>";
		echo "<tr align='center'>";
		$x=0;
		}
		
		} 
		echo "</table>";
		?>
       </td>

<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td>
<?php
		$b=$cup["bicicletas"];//Cantidad de parqueaderos disponibles
		
		$x=0;
		echo "<table border='0'  Style='font-family: Arial; font-size: 9pt; color:black'>";
		echo "<tr align='center'>";
		
		for ($i = 1; $i <= $b; $i++) 
		{
			$x=$x+1;
			
			if ($verificar=$estacionado->num_rows)
			{
				$usar="";
			}	
			else
			{
				$usar="onclick='sub($i);change(this);'";
			}
			
			
			if (in_array($i, $estbicicleta))
			{
				echo "<td align='center' style='width:30px'>";
			    echo "<input type='submit' name='posicion' $usar style='width:30px; background-color:gray' value='$i'></td>";	
			}
			else
			{
				echo "<td style='width:30px'>";
			    echo "<input type='button' name='posicion' style='width:30px' value='$i'><!--$i--></td>";
			}
		
		if ($x==15) {
			echo "</tr>";
		echo "<tr align='center'>";
		$x=0;
		}
		
		} 
		echo "</table";
		?>
       </td>
</tr>
<tr>
<td colspan="12" align="center" class="alert alert-info">
ESTACIONAMIENTO ASIGNADO <input type='text' name='lugar' class='inputcentrado' size='5' readonly>

</td>
</tr>

</table>


<table border="0" width="90%" class="alert alert-primary" align="center" Style="font-family: Arial; font-size: 10pt;"> 
<tr>
<td colspan="2" align="center">TARIFAS</td>
<td></td>
<td align="center"><strong>TIPO</strong></td>
<td align="center"><strong>MOTOS</strong></td>
<td align="center"><strong>BICICLETAS</strong></td>
</tr>
<tr>
<td>Minutos</td>
<td><input type="radio" name="radio" disabled></td>
<td></td>
<td>Capacidad</td>
<td><input type="text" name="capacidadmotos" size="10"disabled value="<?php echo $cup["motos"];?>" style="text-align:center"></td>
<td><input type="text" name="capacidadbici"size="10"disabled value="<?php echo $cup["bicicletas"]?>" style="text-align:center"></td>
<td>Costo segun tarifario</td>
<td><input type="text" name="costotarif" disabled></td>
</tr>

<tr>
<td>Horas</td>
<td><input type="radio" name="radio" disabled></td>
<td></td>
<td>Ocupados</td>
<td><input type="text" name="ocupadosmotos"size="10"disabled value="<?php echo $mot["motos"];?>" style="text-align:center"></td>
<td><input type="text" name="ocupadosbici"size="10" disabled value="<?php echo $bic["bicicletas"];?>" style="text-align:center"></td>
<td>Valor a pagar</td>
<td><input type="text" name="apagar" disabled></td>
</tr>

<tr>
<td>Dias</td>
<td><input type="radio" name="radio" disabled></td>
<td></td>
<td>Disponible</td>
<td><input type="text" name="disponiblemotos"size="10" disabled value="<?php echo $mdisp;?>" style="text-align:center"></td>
<td><input type="text" name="disponiblebici"size="10"disabled value="<?php echo $bdisp;?>" style="text-align:center"></td>
<td>Efectivo</td>
<td><input type="text" name="efectivo" disabled></td>
</tr>
</tr>

<tr>
<td>Mensualidad</td>
<td><input type="radio"name="radio" disabled></td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td colspan="3"></td>
<td>Cambio</td>
<td><input type="text" name="cambio" disabled></td>
</tr>
</table>

<br>

</form>
<table border="0" width="60%" align="center">
<tr> 
<td align="center">
<button  button class="btn btn-info btn-md"  disabled>
INGRESAR</td> 

<td align="center"> 
<button  button class="btn btn-info btn-md" disabled>
REGISTRAR SALIDA</td> 


<td align="center">
<a type="button" href="vista/listado.php" target="_blank" class="btn btn-info btn-md">PARQUEADOS</a>
</td>

<td align="center">
<a type="button" href="vista/listadocobrados.php" target="_blank" button class="btn btn-info btn-md">COBRADOS</a>
</td> 
</tr>
<br>
</table> 
</td>
</tr>
<br>
</table> 


</div> 
</div> 
</div> 
</div> 
</div>
</strong></em></header>
</div>
</body>
</html>