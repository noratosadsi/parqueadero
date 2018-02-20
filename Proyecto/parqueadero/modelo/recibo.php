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
<body background="../vista/imagenes/tecnologia.jpg"><em><strong>
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

  
  $factura=$mysql->query("select * from factura
	where vehiculo_cliente_cedula=$_REQUEST[cedularecibo]");
	if($mysql->error)
	die(header("Location: ../vista/vehiculofactura.php?error=Ingreso no válido"));
	$fac=$factura->fetch_array();
	
    $mysql->query("update detallefactura
    inner join factura
    on detallefactura.factura_idFactura=factura.idFactura 
    set fechafactura=now()
    where idFactura=$fac[idFactura];");
	if($mysql->error)
	die(header("Location: ../vista/vehiculofactura.php?error=Número de cédula no se encuentra registrado"));
	

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
  where cliente.cedula=$_REQUEST[cedularecibo] and
  usuario.nombre='$_SESSION[login]' and usuario.apellido='$_SESSION[nombre]';")
	or die ($mysql->error);
	$con=$consulta->fetch_array();
	
	$horasalida=$con["horasalida"];
	$duracion=$con["duracion"];
	$precio=$con["precio"];
	$iva=$con["iva"];
	$total=$con["total"];
	
	if ($horasalida=="")
	{
		$horasalida="sin registrar";
	}
	if ($duracion=="")
	{
		$duracion="sin registrar";
	}
	if ($precio=="")
	{
		$precio="sin registrar";
	}
	else
	{
		$precio="$$precio";
	}
	if ($iva=="")
	{
		$iva="sin registrar";
	}
	else
	{
		$iva="$$iva";
	}
	if ($total=="")
	{
		$total="sin registrar";
	}
	else
	{
		$total="$$total";
	}
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
      echo $con['nom']." ".$con['ape'];
      echo '</td>';
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
      echo $horasalida;
      echo '</td>';
	  echo '</tr>';
	  echo '<tr>';
	  echo '<td align="center">';
      echo 'Duracion';
      echo '</td>';
      echo '<td align="center">';
      echo $duracion;
      echo '</td>';
	  echo '</tr>';
	  echo '<tr>';
	  echo '<td align="center">';
      echo 'Precio';
      echo '</td>';
      echo '<td align="center">';
      echo $precio;
      echo '</td>';
	  echo '</tr>';
	  echo '<tr>';
	  echo '<td align="center">';
      echo 'Iva';
      echo '</td>';
      echo '<td align="center">';
      echo $iva;
      echo '</td>';
	  echo '</tr>';
	  echo '<tr>';
	  echo '<td align="center">';
      echo 'Toral';
      echo '</td>';
      echo '<td align="center">';
      echo $total;
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