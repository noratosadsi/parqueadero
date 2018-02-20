<?php 
include '../controlador/control.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Mi Proyecto</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
<script src="bootstrap/js/bootstrap.min.js"></script>
</head>
<body><em><strong>
<div class="container">
<header>
<?php include_once 'header.php'; ?>



<div class="col-sm-12 col-md-12"> 
<div class="panel panel-default"> 
<!-- contenedor del titulo--> 
<div class="panel-heading"> 
<h2 align="center">NORATO`S PARKING</h2> 
</div> 
<div class="panel-body"> 


<!-- Contenedor ejercicio--> 
<div class="alert alert-success"> 
<div class="row"> 
<div class="col-sm-12 col-md-12">  


<table class="table-bordered" align="right"> 
<tr> 
<td align="right" class="alert-warning" style="font-size:20px">
FECHA Y HORA</td>
<td bgcolor="#" align="center" class="alert-warning ">
<h1>
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

<div id="reloj" style="font-size:35px;"></div>
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
</script></h1>
</td>
</tr>
</table>
</div>
 
<div class="row">
<div class="col-md-12">
<div class="col-md-4">
<table class="table table-condensed-bordered alert-warning">
<tr>
<td>Cedula </td>
<td> <input type="text"></td><br>
</tr>
<tr>
<td>Nombre </td>
<td> <input type="text"></td>
</tr>
<tr>
<td>Apellido</td>
<td> <input type="text"></td>
</tr>
<tr>
<td>Telefono1</td>
<td> <input type="text"></td>
</tr>
<tr>
<td>Telefono2</td>
<td> <input type="text"></td>
</tr>
</table>
</div>

<div class="col-md-4">
<table class="table table-condensed alert-warning">
<tr>
<td>Placa o matricula </td>
<td> <input type="text"></td><br>
</tr>
<tr>
<td>Marca </td>
<td> <input type="text"></td>
</tr>
<tr>
<td>Modelo</td>
<td> <input type="text"></td>
</tr>
<tr>
<td>Tipo</td>
<td> <input type="text"></td>
</tr>
<tr>
<td>Descripcion / Observacion</td>
<td> <input type="text"></td>
</tr>
</table>
</div>

<div class="col-md-4">
<table class="table table-condensed alert-warning">
<tr>
<td>Fecha y hora de Ingreso </td>
<td> <input type="text"></td><br>
</tr>
<tr>
<td>Fecha y hora de Salida </td>
<td> <input type="text"></td>
</tr>
<tr>
<td>Duracion </td>
<td> <input type="text"></td>
</tr>
<tr>
<td>Precio </td>
<td> <input type="text"></td>
</tr>
<tr>
<td>Iva	</td>
<td> <input type="text"></td>
</tr>
</table>
</div>
</div>
</div>


<br><br>




</div> 
</div> 
</div>
</header>
</div>
</strong></em></body>
</html>