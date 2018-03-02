<?php include '../controlador/control.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Mi Proyecto</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
<script src="bootstrap/js/bootstrap.min.js"></script>
</head>
<body background="imagenes/tecnol.jpg"><em><strong>
<div class="container">
<header>
<?php include_once 'header.php'; ?>
<div class="col-sm-15 col-md-15"> 
<div class="panel panel-default"> 
<!-- contenedor del titulo--> 
<div class="panel-heading"> 
<h2 align="center">PRECIO</h2> 
</div> 
<div class="panel-body"> 
<!-- Contenedor ejercicio-->
<div class="alert alert-success"> 
<div class="row"> 
<div class="col-sm-15 col-md-15">  
<!--nuevo-->	
<form action="precio.php" method="post">
<table align="center" width="900"> 
<tr>
<td  rowspan="2" valign="middle">
Seleccione vehículo
<select name="tipo">
<option value="moto">Moto</option>
<option value="bicicleta">Bicicleta</option>
</select>
</td>
<td align="center" width="400">	Ingrese precio por minuto
<input type="text" name="precio" required>
</td>
<td rowspan="2" align="center" valign="middle" name="prueba" width="270">	
<?php
include "../modelo/cambiarprecio.php";
?>
</td>
</tr>
<tr>
<td align="center">
<br>
<input type="submit" value="CAMBIAR PRECIO"  class="btn btn-info"><br>
</td>
</tr>
</table>
</form>
<p name="error" align="center">
<?php
if (isset($_REQUEST["error"])){ echo $_REQUEST["error"];}
?>
</p>
</div> 
</div> 
</div> 
</div> 
</div>
</header>
</div>
</strong></em>
</body>
</html>