<?php include '../controlador/control.php';
include 'cambiarprecio.php';
$cambiarprecio->ajustar(); 
$cambiarprecio->precio($mysql); 
?>
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
<h2 align="center">VEHICULO REGISTRADO</h2> 
</div> 
<div class="panel-body"> 


<!-- Contenedor ejercicio--> 
<div class="alert alert-success"> 
<div class="row"> 
<div class="col-sm-12 col-md-12">  

<!--nuevo-->
<?php
 // include "config.php";
  
  function registrardatos($mysql)
  {
	  
	  if (is_numeric($_REQUEST["cedulacliente"]))
	  {
		  $error="Número de cédula ya se encuentra registrado";
	  }
	  else
	  {
		  $error="Ingreso no válido";
	  }
	  
  $mysql->query("insert into cliente(cedula,nombre,apellido,telefono1,telefono2) values 
	  ($_REQUEST[cedulacliente],'$_REQUEST[nombre]','$_REQUEST[apellido]','$_REQUEST[telefono1]','$_REQUEST[telefono2]')");
      if($mysql->error)
	  die(header("Location: ../vista/formulario.php?error=$error"));
		
	  
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
	  
	  $registro=$mysql->query("select * from costo")
      or die ($mysql->error);
	  $regi=$registro->fetch_array();
	  
	  if ($_REQUEST["tipo"]=="moto")
	  {
		  $preciovehiculo=1;
	  }
	  elseif ($_REQUEST["tipo"]=="bicicleta")
	  {
		  $preciovehiculo=2;
	  }
	
	  $mysql->query("insert into factura (vehiculo_cliente_cedula,usuario_cedula,
	  usuario_rol_idrol, costo_id) values ($_REQUEST[cedulacliente], $_SESSION[id_usuario],
	  $_SESSION[nivel],$preciovehiculo)")
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
	  
      echo 'Vehiculo registrado';	
  }
  
  function borrar($mysql)
  {
	   $borrar=$mysql->query("select * from factura
	inner join detallefactura
	on factura.idFactura=detallefactura.factura_idFactura
	where vehiculo_cliente_cedula=$_REQUEST[cedulacliente]");
    if ($mysql->error)
	die (header ("Location: ../vista/borrarvehiculo.php?error=Ingreso no válido"));
	$bor=$borrar->fetch_array();
	
	$idFactura=$bor["idFactura"];
	  
	   $mysql->query("delete from detallefactura
    where factura_idFactura=$idFactura;");
	if ($mysql->error)
	die (header ("Location: ../vista/borrarvehiculo.php?error=no fue borrado"));
	$mysql->query("delete from factura
    where vehiculo_cliente_cedula=$_REQUEST[cedulacliente];")
	or die($mysql->error);
	$mysql->query("delete from tipo
    where vehiculo_cliente_cedula=$_REQUEST[cedulacliente];")
	or die($mysql->error);
	$mysql->query("delete from vehiculo 
    where cliente_cedula=$_REQUEST[cedulacliente];")
	or die($mysql->error);
	$mysql->query("delete from cliente
    where cedula=$_REQUEST[cedulacliente];")
	or die($mysql->error);
  }
  
   
  $actualizar=$mysql->query("select count(*) as actualizar from vehiculo
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
      where cliente.cedula=$_REQUEST[cedulacliente] and horasalida is not null
	  and usuario.nombre='$_SESSION[login]' and usuario.apellido='$_SESSION[nombre]'")
  or die ($mysql->error);
  $act=$actualizar->fetch_array();
 

if ($act["actualizar"]==1)
{
	borrar($mysql);
    registrardatos($mysql);   		  
}
else
{
	registrardatos($mysql);  
}

  /*
  $regmoto=$mysql->query("select count(*) as regmotos from cliente 
  inner join vehiculo on cliente.cedula=vehiculo.cliente_cedula
  inner join factura on vehiculo.cliente_cedula=factura.vehiculo_cliente_cedula
  inner join detallefactura on factura.idFactura=detallefactura.factura_idFactura
  inner join tipo on vehiculo.cliente_cedula=tipo.vehiculo_cliente_cedula
  where horasalida is null and tipo='moto';") 
  or die ($mysql->error);
  
  $regm=$regmoto->fetch_array(); 
   
  $regbici=$mysql->query("select count(*) as regbicis from cliente 
  inner join vehiculo on cliente.cedula=vehiculo.cliente_cedula
  inner join factura on vehiculo.cliente_cedula=factura.vehiculo_cliente_cedula
  inner join detallefactura on factura.idFactura=detallefactura.factura_idFactura
  inner join tipo on vehiculo.cliente_cedula=tipo.vehiculo_cliente_cedula
  where horasalida is null and tipo='bicicleta';") 
  or die ($mysql->error);
  
  $regb=$regbici->fetch_array();
  
	  if ($regm['regmotos']>=1 and $_REQUEST['tipo']=="moto")
      {
		  $errormoto="No hay estacionamientos disponibles para motos";
	      header("location:../vista/formulario.php?error=$errormoto");
      }
      elseif ($regm['regmotos']<1 and $_REQUEST['tipo']=="moto")
	  {
			  //borrar($mysql);
		      registrardatos($mysql); 
	  }  
      if ($regb['regbicis']>=60 and $_REQUEST['tipo']=="bicicleta")
      {
		  $errorbici="No hay estacionamientos disponibles para bicicletas";
		  header("location:../vista/formulario.php?error=$errorbici");
      }
      elseif ($regb['regbicis']<60 and $_REQUEST['tipo']=="bicicleta")
      {
			  //borrar($mysql);
		      registrardatos($mysql);
      }*/
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
<html>
<head>
</head>  
<body>
</body>
</html>




