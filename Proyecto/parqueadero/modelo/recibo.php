<?php include '../controlador/control.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Mi Proyecto</title>
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
<h2 align="center">VEHICULO FACTURADO</h2> 
</div> 
<div class="panel-body"> 


<!-- Contenedor ejercicio--> 
<div class="alert alert-success"> 
<div class="row"> 
<div class="col-sm-12 col-md-12">  

<!--nuevo-->
 <?php
include "config.php";

  
  $factura=$mysql->query("select * from historicofacturado
	where cedulaclie=$_REQUEST[cedularecibo] and horaingreso='$_REQUEST[horaingreso]'")
	or die($mysql->error);
	$con=$factura->fetch_array();
	
  
echo '<table Border=2 align="center">';

	
	  echo '<tr>';
	  echo '<td align="center">';
      echo 'Parqueadero';
      echo '</td>';
      echo '<td align="center">';
      echo "Noratos Parking";
      echo '</td>';
	  echo '</tr>';
	  echo '<tr>';
	  echo '<td align="center">';
      echo 'Persona que factura';
      echo '</td>';
      echo '<td align="center">';
      echo $con['nomusu']." ".$con['apeusu'];
      echo '</td>';
	  echo '</tr>';
	  echo '<tr>';
	  echo '<td align="center">';
      echo 'Fecha factura';
      echo '</td>';
      echo '<td align="center">';
      echo $con['fechafacturado'];
      echo '</td>';
	  echo '</tr>';
	  echo '<tr>';
	  echo '<td align="center">';
      echo 'Cedula';
      echo '</td>';
      echo '<td align="center">';
      echo $con['cedulaclie'];
      echo '</td>';
	  echo '</tr>';
	  echo '<tr>';
	  echo '<td align="center">';
      echo 'Nombre';
      echo '</td>';
      echo '<td align="center">';
      echo $con['nomclie'];
      echo '</td>';
      echo '</tr>';
      echo '<tr>';
      echo '<td align="center">';
      echo 'Apellido';
      echo '</td>';	  
      echo '<td align="center">';
      echo $con['apeclie'];
      echo '</td>';
      echo '</tr>';
      echo '<tr>';
      echo '<td align="center">';
      echo 'Primer telefono';
      echo '</td>';	  
      echo '<td align="center">';
      echo $con['telclie1'];
      echo '</td>';
      echo '</tr>';	  
      echo '<tr>';
      echo '<td align="center">';
      echo 'Segundo telefono';
      echo '</td>';	  
      echo '<td align="center">';
      echo $con['telclie2'];
      echo '</td>';
      echo '</tr>';	  
      echo '<tr>';
      echo '<td align="center">';
      echo 'Matricula';
      echo '</td>';	  
	  echo '<td align="center">';
      echo $con['matricula'];
      echo '</td>';
      echo '</tr>';	  
      echo '<tr>';
      echo '<td align="center">';
      echo 'Marca';
      echo '</td>';	  
      echo '<td align="center">';
      echo $con['marca'];
      echo '</td>';
	  echo '</tr>';
	  echo '<tr>';
	  echo '<td align="center">';
      echo 'Modelo';
      echo '</td>';
      echo '<td align="center">';
      echo $con['modelo'];
      echo '</td>';
	  echo '</tr>';
	  echo '<tr>';
	  echo '<td align="center">';
      echo 'Tipo';
      echo '</td>';
      echo '<td align="center">';
      echo $con['tipo'];
      echo '</td>';
	  echo '</tr>';
	  echo '<tr>';
	  echo '<td align="center">';
      echo 'Descripcion';
      echo '</td>';
      echo '<td align="center">';
      echo $con['descripcion'];
      echo '</td>';
      echo '</tr>';	  
      echo '<tr>';
      echo '<td align="center">';
      echo 'Hora ingreso';
      echo '</td>';	  
	  echo '<td align="center">';
      echo $con['horaingreso'];
      echo '</td>';
	  echo '</tr>';
	  echo '<tr>';
	  echo '<td align="center">';
      echo 'Hora salida';
      echo '</td>';
      echo '<td align="center">';
      echo $con['horasalida'];
      echo '</td>';
	  echo '</tr>';
	  echo '<tr>';
	  echo '<td align="center">';
      echo 'Duracion';
      echo '</td>';
      echo '<td align="center">';
      echo $con['duracion'];
      echo '</td>';
	  echo '</tr>';
	  echo '<tr>';
	  echo '<td align="center">';
      echo 'Precio';
      echo '</td>';
      echo '<td align="center">';
      echo "$".$con['precio'];
      echo '</td>';
	  echo '</tr>';
	  echo '<tr>';
	  echo '<td align="center">';
      echo 'Iva';
      echo '</td>';
      echo '<td align="center">';
      echo "$".$con['iva'];
      echo '</td>';
	  echo '</tr>';
	  echo '<tr>';
	  echo '<td align="center">';
      echo 'Toral';
      echo '</td>';
      echo '<td align="center">';
      echo "$".$con['total'];
      echo '</td>';	 	  
      echo '</tr>';	  
	  echo '<table>';
	  
    $mysql->close();
?>

</div> 
</div> 
</div> 
</div> 
</div>

</header>

</div>
</strong></em></body>
</html>