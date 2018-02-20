<!DOCTYPE html>
<html lang="en">

<head>

   <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>REGISTRAR</title>

    
    <link href="vista/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <link href="vista/bootstrap/css/business-casual" rel="stylesheet">

    
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    
    
    <link href="https://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">

</head> 
<body >

    <?php
    include("header.php");
    ?>   
                     
    <center>              
    <div class="box" style="width:80%;height:80%">
 
<form method="POST" action="adsi.php" >
        
<table border="1" align="center"> 
	  
<div class="brand">NORATO´S PARKING</div>

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

<tr align="center">

<td>CEDULA</td>

<td> <input type="text"></td>
<td>PLACA O MATRICULA </td>
<td><input type="text"></td>
<td>FECHA Y HORA DE INGRESO </td>
<td><input type="text" disabled></td>
</tr>
<tr align="center">
<td>NOMBRE </td>
<td> <input type="text"></td>
<td>MARCA </td>
<td><input type="text"></td>
<td>FECHA Y HORA DE SALIDA</td>
<td><input type="text" disabled></td>
</tr>
<tr align="center">
<td>APELLIDOS</td>
<td> <input type="text"></td>
<td>MODELO </td>
<td><input type="text"></td>
<td>TIEMPO DE PERMANENCIA </td>
<td><input type="text"></td>
</tr>
<tr align="center">
<td>TELEFONO 1 </td>
<td><input type="text"></td>
<td>TIPO </td>
<td><input type="text"></td>
<td>PRECIO </td>
<td><input type="text"></td>
</tr>
<tr align="center">
<td>TELEFONO 2 </td>
<td><input type="text"></td>
<td>DESCRIPCION OBSERVACION </td>
<td><input type="text"></td>
<td>IVA </td>
<td><input type="text"></td>
</tr>
</table>

<br>

<table border="1" align="center"> 
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
<td colspan="5">
<?php
		$n=120;//Cantidad de parqueaderos disponibles
		
		$x=0;
		echo "<table border='1'>";
		echo "<tr align='center'>";
		for ($i = 1; $i <= $n; $i++) 
		{
		$x=$x+1;				
			
			echo "<td onclick='change(this);'style='width:40px'>";
			echo "<input type='hidden' value='$i'>$i</td>";
		
		if ($x==12) {
			echo "</tr>";
		echo "<tr align='center'>";
		$x=0;
		}
		
		} 
		echo "</table>";
		?>
       </td>
   
<td>BICICLETAS</td>
<td>
<?php
		$n=60;//Cantidad de parqueaderos disponibles
		
		$x=0;
		echo "<table border='1'>";
		echo "<tr align='center'>";
		for ($i = 1; $i <= $n; $i++) 
		{
		$x=$x+1;				
			
			echo "<td onclick='change(this);' style='width:40px'>";
			echo "<input type='hidden' value='$i'>$i</td>";
		
		if ($x==12) {
			echo "</tr>";
		echo "<tr align='center'>";
		$x=0;
		}
		
		} 
		echo "</table";
		?>
       </td>
</tr>
</table>
<br>

<table border="0" cellspacing="10" align="center">
<tr>
<th colspan="3" align="center">TARIFAS</th>

<th>TIPO</th>
<th>MOTOS</th>
<th>BICICLETAS</th>
</tr>
<tr>
<td>MINUTOS</td>
<td><input type="radio" name="radio" checked="checked" /></td>
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

<br>

<table border="0" width="60%" align="center">
<tr> 
<td align="center">
<button onclick="window.location.href='vista/actualizar.php'" width="500" style="color:#000000" button class="btn btn-primary btn-md">
INGRESAR</td> 

<td align="center"> 
<button onclick="window.location.href='vista/actualizar.php'" width="500" style="color:#000000" button class="btn btn-primary btn-md">
REGISTRAR SALIDA</td> 

<td align="center">
<button onclick="window.location.href='vista/actualizar.php'" width="500" style="color:#000000" button class="btn btn-primary btn-md">
PARQUEADOS</td>

<td align="center">
<button onclick="window.location.href='vista/actualizar.php'" width="500" style="color:#000000" button class="btn btn-primary btn-md" >
COBRADOS</td> 
</tr> 
</table> 

</td>
</tr> 
</table> 
   
      <br>
    
      </form>  

    
      
      </div>
      
      </div>
      
      </div>                  



</body>

</html>