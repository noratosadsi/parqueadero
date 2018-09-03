<?php include "../controlador/control.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>NORATOS PARKING</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="../vista/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
<script src="../vista/bootstrap/js/bootstrap.min.js"></script>
</head>
<body background="../vista/imagenes/tecnol.jpg"><em><strong>
<div class="container">
<header>
<?php include_once '../vista/header.php'; ?>


<div class="col-sm-12 col-md-12"> 
<div class="panel panel-default"> 
<!-- contenedor del titulo--> 
<div class="panel-heading"> 
<h2 align="center">ESTACIONAMIENTOS DISPONIBLES</h2> 
</div> 
<div class="panel-body"> 


<!-- Contenedor ejercicio--> 
<div class="alert alert-success"> 
<div class="row"> 
<div class="col-sm-12 col-md-12">  

<!--nuevo-->
<?php
include "../modelo/config.php";
include "../modelo/cupos.php";
?>
<table border="2" align="center">
<tr>
<td colspan="2">Estacionamientos ocupados</td>
<td colspan="2">Estacionamientos disponibles</td>
</tr>
<tr>
<td align="center">Motos</td>
<td align="center">Bicicletas</td>
<td align="center">Motos</td>
<td align="center">Bicicletas</td>
</tr>
<tr>
<td align="center">
<?php echo $mot['motos'];?>
</td>
<td align="center">
<?php echo $bic['bicicletas'];?>
</td>
<td align="center">
<?php echo $mdisp;?>
</td>
<td align="center">
<?php echo $bdisp;?>
</td>
</tr>
</table>
</div> 
</div> 
</div> 
</div> 
</div>
</div>

</header>

</div>
</strong></em></body>
</html>