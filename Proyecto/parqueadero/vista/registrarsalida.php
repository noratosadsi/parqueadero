<?php include '../controlador/control.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Mi Proyecto</title>
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
<h2 align="center">SALIDA DE VEHICULO REGISTRADA</h2> 
</div> 
<div class="panel-body"> 


<!-- Contenedor ejercicio--> 
<div class="alert alert-success"> 
<div class="row"> 
<div class="col-sm-12 col-md-12">  

<!--nuevo-->
 <?php
include "../modelo/config.php";

$cedula = $_GET['cedulacliente'];

    $salida=$mysql->query("select factura.*, costo.* from factura
	inner join costo on factura.costo_id=costo.id
	inner join detallefactura on factura.idFactura=detallefactura.factura_idFactura
	where vehiculo_cliente_cedula=$cedula and detallefactura.horasalida is null");
	if ($mysql->error)
	die ("Ingreso no válido");   
	$sal=$salida->fetch_array();
	
    $verificar=$mysql->query("select factura.*, costo.* from factura
	inner join costo on factura.costo_id=costo.id
	inner join detallefactura on factura.idFactura=detallefactura.factura_idFactura
	where vehiculo_cliente_cedula=$cedula");
	if ($mysql->error)
	die ("Ingreso no válido");  
	$ver=$verificar->fetch_array();
	
	if (is_numeric($ver["vehiculo_cliente_cedula"]))
	{
		$error="Ya se ha registrado la salida de éste usuario";
	}
	else
	{
		$error="Número de cédula no se encuentra registrado";
	}
	
	
	$precio=$sal['precio']/60;
	
    $mysql->query("update detallefactura
    inner join factura
    on detallefactura.factura_idFactura=factura.idFactura 
    set fechafactura=now(),
	horasalida=now(),
    duracion=timediff(horasalida,horaingreso),
	precio=time_to_sec(duracion)*$precio,
    iva=precio*0.16,
    total=precio+iva
    where idFactura=$sal[idFactura] and horasalida is null;");
	if ($mysql->error)
	die ("$error");
    echo "fue actualizado";
 
	
function corregir($mysql)
{
	$mysql->query("update detallefactura
    inner join factura
    on detallefactura.factura_idFactura=factura.idFactura 
    set horasalida=null,
    duracion=null,
	precio=null,
    iva=null,
    total=null
    where idFactura=$ver[idFactura];");
	if ($mysql->error)
	die (header ("Location: salidavehiculo.php?error=$error"));
}
    $confirmar=$mysql->query("select factura.*, costo.* from factura
	inner join costo on factura.costo_id=costo.id
	inner join detallefactura on factura.idFactura=detallefactura.factura_idFactura
	where vehiculo_cliente_cedula=$cedula and detallefactura.horasalida is not null");
	if ($mysql->error)
	die (header ("Location: salidavehiculo.php?error=Ingreso no válido 2"));  
	$con=$confirmar->fetch_array();


    echo '<h2 align="center">Se ha registrado la salida del vehiculo</h2><br>';

class mostrarrecibo {
	
public function recibo($mysql)
{
	
  $cedula = $_GET['cedulacliente'];
  
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
  where cliente.cedula=$cedula
  and usuario.nombre='$_SESSION[login]' and usuario.apellido='$_SESSION[nombre]';")
	or die ($mysql->error);
echo '<form name="areat" action="modelo/procesa_login.php" method="post">';
echo '<table Border=2 align="center">';

	$con=$consulta->fetch_array();

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
	  echo '<table>'; 
	  echo '</form>';

$mysql->query("insert into historicofacturado (nomusu, apeusu, fechafacturado, cedulaclie,nomclie, apeclie, telclie1, telclie2, matricula, marca, modelo, tipo, descripcion, horaingreso, horasalida, duracion, precio, iva, total) values ('$con[nom]','$con[ape]','$con[fechafactura]','$con[cedula]','$con[nombre]','$con[apellido]','$con[telefono1]','$con[telefono2]','$con[matricula]','$con[marca]','$con[modelo]','$con[tipo]','$con[descripcion]','$con[horaingreso]','$con[horasalida]','$con[duracion]','$con[precio]','$con[iva]','$con[total]')")
or die ($mysql->error);
}
}

$obj1=new mostrarrecibo();
$obj1->recibo($mysql);
$mysql->close();
?>
</div> 
</div> 
</div> 
</div> 
</div>

</header>

</div>
</div>
</strong></em></body>
</html>