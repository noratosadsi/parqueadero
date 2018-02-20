<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<style type="text/css">
    html, body {
        height: 100%;
        width: 100%;
        padding: 0;
        margin: 0;
    }
 
    #full-screen-background-image {
        z-index: -999;
        width: 100%;
        height: auto;
        position: fixed;
        top: 0;
        left: 0;
    }
</style>
</head>
<body>
<img alt="full screen background image" src="Saru_style.gif" id="full-screen-background-image" />

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="bootstrap/css/bootstrap.min.jf.css" rel="stylesheet" media="screen">
<script src="bootstrap/js/bootstrap.min.js"></script>
<div class="table-responsive">
<table class="table" border="1" cellspacing="5" align="center" cellpadding="7" bgcolor="#7C7E7A"> 
<tr> 
<td colspan="4"></td>
<td colspan="1" align="center" bgcolor="#33FF99">
FECHA Y HORA</td>
<td bgcolor="#33FFFF" align="center">
<script type="text/javascript">
function startTime(){
today=new Date();
h=today.getHours();
m=today.getMinutes();
s=today.getSeconds();
m=checkTime(m);
s=checkTime(s);
document.getElementById('reloj').innerHTML=h+":"+m+":"+s;
t=setTimeout('startTime()',500);}
function checkTime(i)
{if (i<10) {i="0" + i;}return i;}
window.onload=function(){startTime();}
</script>

<div id="reloj" style="font-size:30px;"></div>
<script type="text/javascript">
//<![CDATA[
var date = new Date();
var d  = date.getDate();
var day = (d < 10) ? '0' + d : d;
var m = date.getMonth() + 1;
var month = (m < 10) ? '0' + m : m;
var yy = date.getYear();
var year = (yy < 1000) ? yy + 1900 : yy;
document.write(day + "/" + month + "/" + year);
//]]>
</script>
</td>
</tr>

<tr align="right">

<td>CEDULA</td>

<td> <input type="text"></td>
<td>PLACA O MATRICULA </td>
<td><input type="text"></td>
<td>FECHA Y HORA DE INGRESO </td>
<td><input type="text"></td>
</tr>
<tr align="right">
<td>NOMBRE </td>
<td> <input type="text"></td>
<td>MARCA </td>
<td><input type="text"></td>
<td>FECHA Y HORA DE SALIDA</td>
<td><input type="text"></td>
</tr>
<tr align="right">
<td>APELLIDOS</td>
<td> <input type="text"></td>
<td>MODELO </td>
<td><input type="text"></td>
<td>TIEMPO DE PERMANENCIA </td>
<td><input type="text"></td>
</tr>
<tr align="right">
<td>TELEFONO 1 </td>
<td><input type="text"></td>
<td>TIPO </td>
<td><input type="text"></td>
<td>PRECIO </td>
<td><input type="text"></td>
</tr>
<tr align="right">
<td>TELEFONO 2 </td>
<td><input type="text"></td>
<td>DESCRIPCION OBSERVACION </td>
<td><input type="text"></td>
<td>IVA </td>
<td><input type="text"></td>
</tr>
</table>
</div>
<br><br>

<table class="table" border="2" cellspacing="5" align="center" cellpadding="7" bgcolor="#7C7E7A"> 
	<script>
		var color1="";
		var color2="";
		function change (elemento) {
			if(color1=="yellow")
			{
				elemento.style.backgroundColor=color1="#fff";
			}else{
				elemento.style.backgroundColor=color1="yellow";
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
	</script>

<tr>
<td>ESTACIONAMIENTOS</td>
<td>MOTOS</td>
<td>
<?php
		$n=70;//Cantidad de parqueaderos disponibles
		
		$x=0;
		echo "<table bgcolor= 'white' border='1' cellpadding='8'>";
		echo "<tr align='center'>";
		for ($i = 1; $i <= $n; $i++) 
		{
		$x=$x+1;				
			
			echo "<td onclick='change(this);'>";
			echo "<input type='hidden' value='$i'>$i</td>";
		
		if ($x==15) {
			echo "</tr>";
		echo "<tr>";
		$x=0;
		}
		
		} 
		echo "</table";
		?>
       </td>
   
<td>BICICLETAS</td>
<td>
<?php
		$n=60;//Cantidad de parqueaderos disponibles
		
		$x=0;
		echo "<table bgcolor= 'white' border='1' cellpadding='8'>";
		echo "<tr align='center'>";
		for ($i = 1; $i <= $n; $i++) 
		{
		$x=$x+1;				
			
			echo "<td onclick='change(this);'>";
			echo "<input type='hidden' value='$i'>$i</td>";
		
		if ($x==15) {
			echo "</tr>";
		echo "<tr>";
		$x=0;
		}
		
		} 
		echo "</table";
		?>
       </td>
</tr>
</table>
<br /><br /><br /><br />

<table class="table" border="1" cellspacing="10" align="center" bgcolor="#7C7E7A">
<tr>
<th colspan="2">TARIFAS</th>
<td></td>
<th>TIPO</th>
<th>MOTOS</th>
<th>BICICLETAS</th>
</tr>
<tr>
<td>MINUTOS</td>
<td><input type="radio" name="radio" /></td>
<td></td>
<td>CAPACIDAD</td>
<td><input type="text" name="capacidadmotos"/></td>
<td><input type="text" name="capacidadbici"/></td>
<td>COSTO SEGUN TARIFARIO</td>
<td><input type="text" name="costotarif"/></td>
</tr>

<tr>
<td>HORAS</td>
<td><input type="radio" name="radio" /></td>
<td></td>
<td>OCUPADOS</td>
<td><input type="text" name="ocupadosmotos"/></td>
<td><input type="text" name="ocupadosbici"/></td>
<td>VALOR A PAGAR</td>
<td><input type="text" name="apagar"/></td>
</tr>

<tr>
<td>DIAS</td>
<td><input type="radio" name="radio" /></td>
<td></td>
<td>DISPONIBLE</td>
<td><input type="text" name="disponiblemotos"/></td>
<td><input type="text" name="disponiblebici"/></td>
<td>EFECTIVO</td>
<td><input type="text" name="efectivo"/></td>
</tr>
</tr>

<tr>
<td>MENSUALIDAD</td>
<td><input type="radio"name="radio"/></td>
<td><input type="text" style="border:none"/></td>
<td colspan="3"></td>
<td>CAMBIO</td>
<td><input type="text" name="cambio"/></td>
</tr>
</table>

<br /><br /><br /><br />

<table border="0" width="40%" height="5%"align="center" cellpadding="5" cellspacing="5">
<tr> 
<td width="25%"> 
<table border="1" bgcolor="#7C7E7A">
<tr> 
<td><button onclick="window.location.href='vista/actualizar.php'" width="500" style="color:#000000">
INGRESAR</td> 

</tr> 

</table> 
</td>
 
<td width="25%"> 
<table border="1" bgcolor="#7C7E7A"> 
<tr> 
<td><button onclick="window.location.href='vista/actualizar.php'" width="500" style="color:#000000">
REGISTRAR SALIDA</td> 

</tr> 

</table> 
</td> 

<td width="25%"> 
<table border="1" bgcolor="#7C7E7A"> 
<tr> 
<td><button onclick="window.location.href='vista/actualizar.php'" width="500" style="color:#000000">
PARQUEADOS</td> 

</tr> 

</table> 
</td>

<td width="25%"> 
<table border="1" bgcolor="#7C7E7A"> 
<tr> 
<td><button onclick="window.location.href='vista/actualizar.php'" width="500" style="color:#000000">
COBRADOS</td> 

</tr> 

</table> 
</td>
</tr> 
</table> 

</body>
</html>