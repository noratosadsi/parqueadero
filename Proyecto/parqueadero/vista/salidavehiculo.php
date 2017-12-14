<?php include '../controlador/control.php'; ?>
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
<h2 align="center">SALIDA DE VEHICULOS</h2> 
</div> 
<div class="panel-body"> 


<!-- Contenedor ejercicio--> 
<div class="alert alert-success"> 
<div class="row"> 
<div class="col-sm-12 col-md-12">  

<!--nuevo-->
<form action="../vista/registrarsalida.php" method="post">
<table class="table"> 
<tr><td align="right">Ingrese Numero de cédula</td>
<td><input type="text" name="cedulasalida" required><br></td></tr>
<tr><td colspan="12" align="center"><input type="submit" value="REGISTRAR SALIDA VEHICULO"><br></td></tr>
<table>
</form>
<p name="error" align="center">
<?php
if (isset($_REQUEST["error"])) {echo $_REQUEST["error"];}
?>
</p>
</div> 
</div> 
</div> 
</div> 
</div>

</header>

</div>
</strong></em></body>
</html>