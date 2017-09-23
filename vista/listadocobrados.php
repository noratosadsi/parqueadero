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
<div class="col-sm-16 col-md-16"> 
<div class="panel panel-default"> 
<!-- contenedor del titulo--> 
<div class="panel-heading"> 
<h2 align="center">LISTADO DE PARQUEOS COBRADOS</h2> 
</div> 
<div class="panel-body"> 


<!-- Contenedor ejercicio--> 
<div class="alert alert-success"> 
<div class="row"> 
<div class="col-sm-12 col-md-12">  

<!--nuevo-->
<?php
$mysql=new mysqli("localhost","root","","parqueadero");   
    if ($mysql->connect_error)
      die('Problemas con la conexion a la base de datos');
  
  $consulta=$mysql->query("select cliente.*, vehiculo.matricula, vehiculo.marca,
  vehiculo.modelo, tipo.tipo, tipo.descripcion, 
  detallefactura.* from vehiculo
  inner join cliente
  on vehiculo.cliente_cedula=cliente.cedula
  inner join tipo
  on vehiculo.cliente_cedula=tipo.vehiculo_cliente_cedula
  inner join factura
  on vehiculo.cliente_cedula=factura.vehiculo_cliente_cedula
  inner join detallefactura
  on factura.idFactura=detallefactura.factura_idFactura
  where detallefactura.horasalida is not null;")
	or die ($mysql->error);

echo '<table class="table" Border=2 cellspacing=2>';
	echo '<tr><th>Cedula</th><th>Nombre</th><th>Apellido</th><th>Telefono 1</th><th>Telefono 2</th><th>Matricula</th><th>Marca</th><th>Modelo</th>
	<th>Tipo</th><th>Descripcion</th><th>Hora Ingreso</th>
	<th>Hora Salida</th><th>Duracion</th><th>Precio</th><th>Iva</th>
	<th>Total</th></tr>';
	while ($con=$consulta->fetch_array())
	{
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
      echo "$ ".$con['precio'];
      echo '</td>';
      echo '<td>';
      echo "$ ".$con['iva'];
      echo '</td>';
      echo '<td>';
      echo "$ ".$con['total'];
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
</body>
</html>