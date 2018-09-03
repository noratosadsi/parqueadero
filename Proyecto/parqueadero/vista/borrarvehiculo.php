<?php include '../controlador/control.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>NORATOS PARKING</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
<script src="bootstrap/js/bootstrap.min.js"></script>
</head>
<body background="imagenes/tecnol.jpg"><em><strong>
<div class="container">
<header>
<?php include_once 'header.php'; ?>


<div class="col-sm-14 col-md-14"> 
<div class="panel panel-default"> 
<!-- contenedor del titulo--> 
<div class="panel-heading"> 
<h2 align="center" >BORRAR REGISTRO DEL VEHICULO</h2> 
</div> 
<div class="panel-body"> 


<!-- Contenedor ejercicio--> 
<div class="alert alert-success"> 
<div class="row"> 
<div class="col-sm-12 col-md-12">  

<!--nuevo-->
<table class="table table-condensed table-bordered">
	<tr class="active">
		<th>Cedula</th>
		<th>Nombre</th>
		<th>Apellido</th>
		<th>Telefono 1</th>
		<th>Telefono 2</th>
		<th>Matricula</th>
		<th>Marca</th>
		<th>Modelo</th>
	<th>Tipo</th>
	<th>Descripcion</th>
	<th>Hora Ingreso</th>
	<th>Hora Salida</th>
	<th>Duracion</th>
	<th>Precio</th>
	<th>Iva</th>
	<th>Total</th>
	<th>Borrar</th>
</tr>
<?php
include "../modelo/borrar.php";

$mostrar=mostrar($mysql);

foreach ($mostrar as $mos) 
	{
		$total=$mos["total"]+$mos["iva"];
?>

<tr>
 <td>
    <?php  echo $mos['cedula']; ?>
</td>
  <td>
    <?php  echo $mos['nombre']; ?>
</td>
  <td>
    <?php  echo $mos['apellido']; ?>
</td>
  <td>
    <?php  echo $mos['telefono1']; ?>
</td>
  <td>
    <?php  echo $mos['telefono2']; ?>
</td>
  <td>
    <?php  echo $mos['matricula']; ?>
</td>
  <td>
    <?php  echo $mos['marca']; ?>
</td>
  <td>
    <?php  echo $mos['modelo']; ?>
</td>
  <td>
    <?php  echo $mos['tipo']; ?>
</td>
  <td>
    <?php  echo $mos['descripcion']; ?>
</td>
  <td>
    <?php  echo $mos['horaingreso']; ?>
</td>
  <td>
    <?php  echo $mos['horasalida']; ?>
</td>
  <td>
    <?php  echo $mos['duracion']; ?>
</td>
  <td>
    <?php  echo "$ ".$mos['total']; ?>
</td>
  <td>
    <?php  echo "$ ".$mos['iva']; ?>
</td>
  <td>
    <?php  echo "$ ".$total; ?>
</td>
 <td>
  <button  class="btn btn-danger btn-xs" onclick="window.location.href='../modelo/borrar.php?cedulaborrar=<?php echo $mos["cedula"]; ?>'">Borrar</button>
 </td>  
 </tr>

<?php };

?>
</table>
</div> 
</div> 
</div> 
</div> 
</div>
</header>
</div>
</strong></em></body>
</html>
