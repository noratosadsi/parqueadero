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
<body><em><strong>
<div class="container">
<header>
<?php include_once 'header.php'; ?>

<div class="col-sm-14 col-md-14"> 
<div class="panel panel-default"> 
<!-- contenedor del titulo--> 
<div class="panel-heading"> 
<h2 align="center">LISTADO DE PARQUEOS COBRADOS</h2> 
</div> 
<div class="panel-body"> 


<!-- Contenedor ejercicio--> 
<div class="alert"> 
<div class="row"> 
<div class="col-sm-12 col-md-12">  

<!--nuevo-->
<?php
include "../modelo/config.php";
  
  $consulta=$mysql->query("select * from vistaparqueados where numero is null")
	or die ($mysql->error);


echo '<table class="table table-condensed table-bordered">';
	echo '<tr class="active"><th>Cedula</th><th>Nombre</th><th>Apellido</th><th>Telefono 1</th><th>Telefono 2</th><th>Matricula</th><th>Marca</th><th>Modelo</th>
	<th>Tipo</th><th>Descripcion</th><th>Hora Ingreso</th>
	<th>Hora Salida</th><th>Duracion</th><th>Precio</th><th>Iva</th>
	<th>Total</th><th>Factura</th></tr>';
	while ($con=$consulta->fetch_array())
	{
    $total=$con["total"]+$con["iva"];
    
	  echo '<tr>';
      echo '<td>';
      echo $con['cedula'];
      echo '</td>';
      echo '<td>';
      echo $con['nombre'];
      echo '</td>';	 	
      echo '<td>';
      echo $con['apellido'];
      echo '</td>';	
      echo '<td>';
      echo $con['telefono1'];
      echo '</td>';	 
      echo '<td>';
      echo $con['telefono2'];
      echo '</td>';
	  echo '<td>';
      echo $con['matricula'];
      echo '</td>';	
      echo '<td>';
      echo $con['marca'];
      echo '</td>';
      echo '<td>';
      echo $con['modelo'];
      echo '</td>';
      echo '<td>';
      echo $con['tipo'];
      echo '</td>';
      echo '<td>';
      echo $con['descripcion'];
      echo '</td>';	  
	  echo '<td>';
      echo $con['horaingreso'];
      echo '</td>';
      echo '<td>';
      echo $con['horasalida'];
      echo '</td>';
      echo '<td>';
      echo $con['duracion'];
      echo '</td>';
      echo '<td>';
      echo "$ ".$con['total'];
      echo '</td>';
      echo '<td>';
      echo "$ ".$con['iva'];
      echo '</td>';
      echo '<td>';
      echo "$ ".$total;
      echo '</td>';	
      echo '<td>';
      echo "<a href=\"../modelo/recibo.php?cedularecibo=$con[cedula]&horaingreso=$con[horaingreso]\" target=\"_blank\">Factura</a>";
      echo '</td>'; 	  
      echo '</tr>';	  
	}
	  echo '<table>';
	
    $mysql->close();
?>
</div> 
</div> 
</div> 
</div> 
</div>
</div>
</header>

</strong></em></body>
</html>