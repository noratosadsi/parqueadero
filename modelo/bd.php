<!DOCTYPE html>
<html lang="en">
<head>
<title>Mi Proyecto</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="../vista/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
<script src="../vista/bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
<header>
<?php include_once '../vista/header.php'; ?>
<div class="col-sm-12 col-md-12"> 
<div class="panel panel-default"> 
<!-- contenedor del titulo--> 
<div class="panel-heading"> 
<h2 align="center">VEHICULO REGISTRADO</h2> 
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
    
    $mysql->query("insert into cliente(cedula,nombre,apellido,telefono1,telefono2) values 
	($_REQUEST[cedulacliente],'$_REQUEST[nombre]','$_REQUEST[apellido]','$_REQUEST[telefono1]','$_REQUEST[telefono2]')") or
      die($mysql->error);
	  
	$mysql->query("insert into vehiculo (matricula,marca,modelo,cliente_cedula)
	values ('$_REQUEST[matricula]','$_REQUEST[marca]','$_REQUEST[modelo]',
	$_REQUEST[cedulacliente])") 
    or die ($mysql->error);	
    
    $mysql->query("insert into tipo(tipo,descripcion,marca,modelo,vehiculo_cliente_cedula)
	values ('$_REQUEST[tipo]','$_REQUEST[descripcion]','$_REQUEST[marca]',
	'$_REQUEST[modelo]',$_REQUEST[cedulacliente])") 
    or die ($mysql->error);
	
	$registros=$mysql->query("select * from usuario")
    or die ($mysql->error);
	$reg=$registros->fetch_array();
	
	$mysql->query("insert into factura (vehiculo_cliente_cedula,usuario_cedula,
	usuario_rol_idrol) values ($_REQUEST[cedulacliente], $reg[cedula],
	$reg[rol_idrol])")
    or die ($mysql->error);
	
	$factura=$mysql->query("select * from factura where 
	vehiculo_cliente_cedula=$_REQUEST[cedulacliente]")
    or die ($mysql->error);
	$fac=$factura->fetch_array();
	
	$mysql->query("insert into detallefactura 
    (fechafactura, horaingreso, factura_idFactura) 
    values (now(),now(), $fac[idFactura])")
    or die ($mysql->error);
    $mysql->close();
    
    echo 'Nuevo vehiculo registrado';	
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
<html>
<head>
</head>  
<body>
</body>
</html>




