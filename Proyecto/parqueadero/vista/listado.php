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

<div class="col-sm-12 col-md-12"> 
<div class="panel panel-default"> 
<!-- contenedor del titulo--> 
<div class="panel-heading"> 
<h2 align="center">LISTADO DE VEHICULOS PARQUEADOS</h2> 
</div> 
<div class="panel-body"> 


<!-- Contenedor ejercicio--> 
<div class="alert"> 
<div class="row"> 
<div class="col-sm-12 col-md-12">  

<!--nuevo-->
<?php
include "../modelo/config.php";
  
  $mostrar=$mysql->query("select * from vistaparqueados where numero is not null")
	or die ($mysql->error);
	
	echo '<table class="table table-condensed table-bordered">';
	echo '<tr class="active"><th>Cedula</th><th>Nombre</th><th>Apellido</th><th>Telefono 1</th><th>Telefono 2</th><th>Matricula</th><th>Marca</th><th>Modelo</th>
	<th>Tipo</th><th>Descripcion</th><th>Hora Ingreso</th><th>Estacionamiento</th></tr>';
	while ($mos=$mostrar->fetch_array())
	{
	  echo '<tr>';
      echo '<td>';
      echo $mos['cedula'];
      echo '</td>';
      echo '<td>';
      echo $mos['nombre'];
      echo '</td>';	 	
      echo '<td>';
      echo $mos['apellido'];
      echo '</td>';	
      echo '<td>';
      echo $mos['telefono1'];
      echo '</td>';	 
      echo '<td>';
      echo $mos['telefono2'];
      echo '</td>';	
	  echo '<td>';
      echo $mos['matricula'];
      echo '</td>';	
      echo '<td>';
      echo $mos['marca'];
      echo '</td>';
      echo '<td>';
      echo $mos['modelo'];
      echo '</td>';
      echo '<td>';
      echo $mos['tipo'];
      echo '</td>';
      echo '<td>';
      echo $mos['descripcion'];
      echo '</td>';	  
	  echo '<td>';
      echo $mos['horaingreso'];
      echo '</td>';
      echo '<td>';
      echo $mos['numero'];
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

</header>

</div>
</strong></em></body>
</html>