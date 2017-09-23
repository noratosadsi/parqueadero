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
<h2 align="center">SALIDA DE VEHICULO REGISTRADA</h2> 
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
      die("Problemas con la conexión a la base de datos");
   
    $salida=$mysql->query("select * from factura
	where vehiculo_cliente_cedula=$_REQUEST[cedulasalida]") or
      die($mysql->error);    
	$sal=$salida->fetch_array();
	
    $mysql->query("update detallefactura
    inner join factura
    on detallefactura.factura_idFactura=factura.idFactura 
    set fechafactura=now(),
	horasalida=now(),
    duracion=timediff(horasalida,horaingreso),
    precio=time_to_sec(duracion),
    iva=precio*0.16,
    total=precio+iva
    where idFactura=$sal[idFactura];")
	or die($mysql->error);
     
	
    echo '<h2 align="center">Se ha registrado la salida del vehiculo</h2><br>';

  $consulta=$mysql->query("select cliente.*, vehiculo.matricula, vehiculo.marca,
  vehiculo.modelo, tipo.tipo, tipo.descripcion, 
  detallefactura.*, usuario.nombre as nom, usuario.apellido as ape from vehiculo
  inner join cliente
  on vehiculo.cliente_cedula=cliente.cedula
  inner join tipo
  on vehiculo.cliente_cedula=tipo.vehiculo_cliente_cedula
  inner join factura
  on vehiculo.cliente_cedula=factura.vehiculo_cliente_cedula
  inner join detallefactura
  on factura.idFactura=detallefactura.factura_idFactura
  inner join usuario
  on factura.usuario_rol_idrol=usuario.rol_idrol
  where cliente.cedula=$_REQUEST[cedulasalida];")
	or die ($mysql->error);

echo '<table Border=2 align="center">';

	while ($con=$consulta->fetch_array())
	{
	  echo '<tr>';
	  echo '<td align="center">';
      echo 'Parqueadero';
      echo '</td>';
      echo '<th align="center">';
      echo $con['nom']." ".$con['ape'];
      echo '</th>';
	  echo '</tr>';
	  echo '<tr>';
	  echo '<td align="center">';
      echo 'Fecha factura';
      echo '</td>';
      echo '<td align="center">';
      echo $con['fechafactura'];
      echo '</td>';
	  echo '</tr>';
	  echo '<tr>';
	  echo '<td align="center">';
      echo 'Cedula';
      echo '</td>';
      echo '<td align="center">';
      echo $con['cedula'];
      echo '</td>';
	  echo '</tr>';
	  echo '<tr>';
	  echo '<td align="center">';
      echo 'Nombre';
      echo '</td>';
      echo '<td align="center">';
      echo $con['nombre'];
      echo '</td>';
      echo '</tr>';
      echo '<tr>';
      echo '<td align="center">';
      echo 'Apellido';
      echo '</td>';	  
      echo '<td align="center">';
      echo $con['apellido'];
      echo '</td>';
      echo '</tr>';
      echo '<tr>';
      echo '<td align="center">';
      echo 'Primer telefono';
      echo '</td>';	  
      echo '<td align="center">';
      echo $con['telefono1'];
      echo '</td>';
      echo '</tr>';	  
      echo '<tr>';
      echo '<td align="center">';
      echo 'Segundo telefono';
      echo '</td>';	  
      echo '<td align="center">';
      echo $con['telefono2'];
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
      echo "$ ".$con['precio'];
      echo '</td>';
	  echo '</tr>';
	  echo '<tr>';
	  echo '<td align="center">';
      echo 'Iva';
      echo '</td>';
      echo '<td align="center">';
      echo "$ ".$con['iva'];
      echo '</td>';
	  echo '</tr>';
	  echo '<tr>';
	  echo '<td align="center">';
      echo 'Toral';
      echo '</td>';
      echo '<td align="center">';
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