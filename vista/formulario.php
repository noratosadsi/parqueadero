<!DOCTYPE html>
<html lang="en">
<head>
<title>Mi Proyecto</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
<script src="bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
<header>
<?php include_once 'header.php'; ?>


<!-form2-->
<div class="col-sm-12 col-md-12"> 
<div class="panel panel-default"> 
<!-- contenedor del titulo--> 
<div class="panel-heading"> 
<h2 align="center">INGRESO DE VEHICULOS</h2> 
</div> 
<div class="panel-body"> 


<!-- Contenedor ejercicio--> 
<div class="alert alert-success"> 
<div class="row"> 
<div class="col-sm-12 col-md-12">  

<!--nuevo-->
<form action="../modelo/bd.php" method="post">
<table class="table"> 
<tr><td align="right">Ingrese cédula</td>
<td><input type="text" name="cedulacliente"><br></td></tr>
<tr><td align="right">Ingrese nombre</td>
<td><input type="text" name="nombre"><br></td></tr>
<tr><td align="right">Ingrese apellido</td>
<td><input type="text" name="apellido"><br></td></tr>
<tr><td align="right">Ingrese primer teléfono</td>
<td><input type="text" name="telefono1"><br></td></tr>
<tr><td align="right">Ingrese segundo teléfono</td>
<td><input type="text" name="telefono2"><br></td></tr>

<tr><td colspan="12" align="center"><H3>Datos del vehículo</H3></td></tr>

<tr><td align="right">matricula</td>
<td><input type="text" name="matricula"><br></td></tr>
<tr><td align="right">marca</td>
<td><input type="text" name="marca"><br></td></tr>
<tr><td align="right">modelo</td>
<td><input type="text" name="modelo"><br></td></tr>

<tr><td colspan="12" align="center"><H3>Descripción del vehiculo</H3></td></tr>

<tr><td align="right">Tipo</td>
<td><input type="text" name="tipo" ><br></td></tr>
<tr><td align="right">Descripcion</td>
<td><input type="text" name="descripcion"><br></td></tr>
<tr><td align="right">Fecha_Ingreso</td>
<td><input type="datetime" disabled="enabled" value="<?php date_default_timezone_set("America/Bogota"); echo date("Y-m-d") . " " . date("h:i:sa");  ?>" name="fecha_hora" ><br></td>
</tr>
<tr><td colspan="12" align="center"><input type="submit" value="REGISTRAR VEHICULO"><br></td></tr>
<table>
</form>


</div> 
</div> 
</div> 
</div> 
</div>

</header>

</div>
</body>
</html>