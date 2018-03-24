<?php include "../controlador/control.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Mi Proyecto</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="../vista/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
<script src="../vista/bootstrap/js/bootstrap.min.js"></script>
</head>
<body background="../vista/imagenes/tecnol.jpg"><em><strong>
<div class="container">
<header>
<?php include_once '../vista/header.php'; ?>


<div class="col-sm-12 col-md-12"> 
<div class="panel panel-default"> 
<!-- contenedor del titulo--> 
<div class="panel-heading"> 
<h2 align="center">ESTACIONAMIENTOS DISPONIBLES</h2> 
</div> 
<div class="panel-body"> 


<!-- Contenedor ejercicio--> 
<div class="alert alert-success"> 
<div class="row"> 
<div class="col-sm-12 col-md-12">  

<!--nuevo-->
<?php
include "config.php";

  $consulta=$mysql->query("select count(*) as motos from cliente 
inner join vehiculo on cliente.cedula=vehiculo.cliente_cedula
inner join factura on vehiculo.cliente_cedula=factura.vehiculo_cliente_cedula
inner join detallefactura on factura.idFactura=detallefactura.factura_idFactura
inner join tipo on vehiculo.cliente_cedula=tipo.vehiculo_cliente_cedula
where horasalida is null and tipo='moto';")
	or die ($mysql->error);
$mot=$consulta->fetch_array();
	
 $consulta2=$mysql->query("select count(*) as bicicletas from cliente 
inner join vehiculo on cliente.cedula=vehiculo.cliente_cedula
inner join factura on vehiculo.cliente_cedula=factura.vehiculo_cliente_cedula
inner join detallefactura on factura.idFactura=detallefactura.factura_idFactura
inner join tipo on vehiculo.cliente_cedula=tipo.vehiculo_cliente_cedula
where horasalida is null and tipo='bicicleta';")
	or die ($mysql->error);
	
$bic=$consulta2->fetch_array();


$moto=0-$mot['motos'];
$bicicleta=0-$bic['bicicletas'];

if($moto==0)
{
	$moto="sin cupo";
}

if ($bicicleta==0)
{
    $bicicleta="sin cupo";
}

    $mysql->close();	
?>
<table border="2" align="center">
<tr>
<td colspan="2">Estacionamientos ocupados</td>
<td colspan="2">Estacionamientos disponibles</td>
</tr>
<tr>
<td align="center">Motos</td>
<td align="center">Bicicletas</td>
<td align="center">Motos</td>
<td align="center">Bicicletas</td>
</tr>
<tr>
<td align="center">
<?php echo $mot['motos'];?>
</td>
<td align="center">
<?php echo $bic['bicicletas'];?>
</td>
<td align="center">
<?php echo $moto;?>
</td>
<td align="center">
<?php echo $bicicleta;?>
</td>
</tr>
</table>
</div> 
</div> 
</div> 
</div> 
</div>
</div>

</header>

</div>
</strong></em></body>
</html>