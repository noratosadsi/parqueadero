<?php include '../controlador/control.php';
/*include 'cambiarprecio.php';
$cambiarprecio->ajustar(); 
$cambiarprecio->precio($mysql); */
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
include "config.php";

error_reporting(5);	

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


//valida si el vehiculo está estacionado
  
if ($_POST["ingresar"])
{
	if ($act["actualizar"]==1)
	{
		borrar($mysql);
        registrardatos($mysql);
    }
    else
    {
	    registrardatos($mysql);  
    }
}

  function registrardatos($mysql)
  {
	  
  $mysql->query("insert into cliente(cedula,nombre,apellido,telefono1,telefono2) values 
	  ($_REQUEST[cedulacliente],'$_REQUEST[nombre]','$_REQUEST[apellido]','$_REQUEST[telefono1]','$_REQUEST[telefono2]')");
      if($mysql->error)
	  die(header("Location: ../index.php?dato=si"));
		
	  
	  $mysql->query("insert into vehiculo (matricula,marca,modelo,cliente_cedula)
	  values ('$_REQUEST[matricula]','$_REQUEST[marca]','$_REQUEST[modelo]',
	  $_REQUEST[cedulacliente])") 
      or die ($mysql->error);	
    
      $mysql->query("insert into tipo(tipo,descripcion,vehiculo_cliente_cedula)
	  values ('$_REQUEST[tipo]','$_REQUEST[descripcion]',$_REQUEST[cedulacliente])") 
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
	  
      //inserta los datos del estacionamiento
      $mysql->query("insert into estacionamiento (numero, cupos_id) values ($_REQUEST[lugar], $preciovehiculo)")
      or die ($mysql->error." error al ingresar numero estacionamiento");
  
      $estacionamiento=$mysql->query("select * from estacionamiento where numero=$_REQUEST[lugar] and cupos_id=$preciovehiculo")
      or die ($mysql->error);
      $est=$estacionamiento->fetch_array();

      //inserta los datos de la factura
	  $mysql->query("insert into factura (vehiculo_cliente_cedula,usuario_cedula,
	  usuario_rol_idrol, costo_id, estacionamiento_id) values ($_REQUEST[cedulacliente], $_SESSION[id_usuario],
	  $_SESSION[nivel],$preciovehiculo, $est[id])")
      or die ($mysql->error."error al ingresar estacionamiento en factura");
	


	  $factura=$mysql->query("select * from factura where 
	  vehiculo_cliente_cedula=$_REQUEST[cedulacliente]")
      or die ($mysql->error);
	  $fac=$factura->fetch_array();
	
	  $mysql->query("insert into detallefactura 
      (fechafactura, horaingreso, factura_idFactura, precio) 
      values (now(),now(), $fac[idFactura], '$_POST[costotarif]')")
      or die ($mysql->error);    
	  
	  $mysql->close();
	  
header("location: ../index.php?dato1=si");
        }
  
  function borrar($mysql)
  {
	   $borrar=$mysql->query("select * from factura
	inner join detallefactura
	on factura.idFactura=detallefactura.factura_idFactura
	where vehiculo_cliente_cedula=$_REQUEST[cedulacliente]");
    if ($mysql->error)
	die (header ("Location: ../index.php?error3=si"));
	$bor=$borrar->fetch_array();
	
	$idFactura=$bor["idFactura"];
	  
	   $mysql->query("delete from detallefactura
    where factura_idFactura=$idFactura;");
	if ($mysql->error)
	die (header ("Location: ../vista/borrarvehiculo.php?error=no fue borrado"));
	$mysql->query("delete from factura
    where vehiculo_cliente_cedula=$_REQUEST[cedulacliente];")
	or die($mysql->error);
	$mysql->query("delete from estacionamiento
    where id=$bor[estacionamiento_id];")
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




