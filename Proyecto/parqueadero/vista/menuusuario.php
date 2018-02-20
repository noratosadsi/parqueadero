<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php include_once 'header.php'; ?>

<table border="1" cellspacing="5" align="center" cellpadding="7"> 
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

<br><br>

<table border="2" cellspacing="5" align="center" cellpadding="7"> 
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
		echo "<table border='1' cellpadding='8'>";
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
		echo "<table border='1' cellpadding='8'>";
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

<table border="1" cellspacing="10" align="center">
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


<title>Documento sin título</title>
</head>

<body>








</body>
</html>