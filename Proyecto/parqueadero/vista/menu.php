<?/*php include 'controlador/control.php'; */?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>NORATOS PARKING</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
<script src="bootstrap/js/bootstrap.min.js"></script>
</head>
<em><strong>
<body background="imagenes/tecnologia.jpg">
<div class="container">
<header>
<?php include_once 'header.php'; ?>
<div class="col-sm-12 col-md-12"> 
<div class="panel panel-default"> 
<!-- contenedor del titulo--> 
<div class="panel-heading"> 
<h2 align="center">MENU NORATO'S PARKING</h2> 
</div> 
<div class="panel-body"> 
<?php /*include_once 'menu vectores.php'*/?>

<!-- Contenedor ejercicio--> 
<div class="alert alert-success"> 
<div class="row"> 
<div class="col-sm-12 col-md-12">  


<table class="table">
<tr><td colspan="2" align="center"><BR>
<button onclick="window.location.href='actualizar.php'" width="500" style="color:#000000">
INGRESAR VEHICULO</td>

<td colspan="2" align="center"><BR>
<button onclick="window.location.href='listado.php'" width="500" style="color:#000000">
LISTADO DE VEHICULOS PARQUEADOS</td>

<td colspan="2" align="center"><BR>
<button onclick="window.location.href='listadocobrados.php'" width="500" style="color:#000000">
LISTADO VEHICULOS COBRADOS</td>

<td colspan="2" align="center"><BR>
<button onclick="window.location.href='vehiculofactura.php'" width="500" style="color:#000000">
CONSULTAR FACTURA</td>

<TABLE class="table">
<div class="panel-heading"> 
<br>
<h2 align="center" class="panel-title" style="color:green">MODIFICAR DATOS VEHICULOS</h2>
</div> 
<tr>
<td colspan="2" align="center"><br>
<button onclick="window.location.href='salidavehiculo.php'" width="500" style="color:#000000">
REGISTRAR SALIDA
</td>
<td colspan="2" align="center"><br>
<?php
if ($_SESSION["nivel"]==1)
{
	echo "<button onclick=\"window.location.href='borrarvehiculo.php'\" width=\"500\" style=\"color:#000000\">";
	echo "BORRAR REGISTRO";
}
?>
</td>
<td colspan="2" align="center"><br>
<button onclick="window.location.href='modelo/cupos.php'" width="500" style="color:#000000">
ESTACIONAMIENTOS
</td>
<td colspan='2' align='center'><br>
<?php
if ($_SESSION["nivel"]==1)
{
	echo "<button onclick=\"window.location.href='precio.php'\" width=\"500\" style=\"color:#000000\">";
	echo "PRECIO";
}
?>
</td>
<td colspan="2" align="center"><br>
<?php
if ($_SESSION["nivel"]==1)
{
	echo "<button onclick=\"window.location.href='registro.php'\" width=\"500\" style=\"color:#000000\">";
	echo "REGISTRAR USUARIOS";
}	
?>
</td>
</tr>
</TABLE>
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