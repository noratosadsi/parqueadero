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
<h2 align="center">VEHICULO BORRADO</h2> 
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
   
    $borrar=$mysql->query("select * from factura
	where vehiculo_cliente_cedula=$_REQUEST[cedulaborrar]") or
      die($mysql->error);    
	$bor=$borrar->fetch_array();
	
    $mysql->query("delete from detallefactura
    where factura_idFactura=$bor[idFactura];")
	or die($mysql->error);
	$mysql->query("delete from factura
    where vehiculo_cliente_cedula=$_REQUEST[cedulaborrar];")
	or die($mysql->error);
	$mysql->query("delete from tipo
    where vehiculo_cliente_cedula=$_REQUEST[cedulaborrar];")
	or die($mysql->error);
	$mysql->query("delete from vehiculo 
    where cliente_cedula=$_REQUEST[cedulaborrar];")
	or die($mysql->error);
	$mysql->query("delete from cliente
    where cedula=$_REQUEST[cedulaborrar];")
	or die($mysql->error);
     
    echo 'Se ha borrado el registro del vehiculo';
	 
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
<html>
<head>
</head>  
<body>
</body>
</html>