<?php 
/*include '../controlador/control.php'; */
?>
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
<h2 align="center">INGRESO DE VEHICULOS</h2> 
</div> 
<div class="panel-body"> 


<!-- Contenedor ejercicio--> 
<div class="alert alert-success"> 
<div class="row"> 
<div class="col-sm-12 col-md-12">  

<?php
$cedula = isset($_REQUEST['cedulaactualizar']) ? $_REQUEST['cedulaactualizar'] : null ;
include "../modelo/config.php";

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
      where cliente.cedula=$cedula and horasalida is not null")
	  or die ($mysql->error);
	  $con=$consulta->fetch_array();
	  
?>


<!--nuevo-->
<form action="../modelo/bd.php" method="post">
<table class="table"> 
<tr><td align="right">Ingrese cédula</td>
<td>
<input type="text" name="cedulacliente" value="<?php echo $cedula; ?>"required><br>

</td>
</tr> 
<tr><td align="right">Ingrese nombre</td>
<td><input type="text" name="nombre" value="<?php echo $con['nombre']; ?>" required><br></td></tr>
<tr><td align="right">Ingrese apellido</td>
<td><input type="text" name="apellido" value="<?php echo $con['apellido']; ?>"required><br></td></tr>
<tr><td align="right">Ingrese primer teléfono</td>
<td><input type="text" name="telefono1" value="<?php echo $con['telefono1']; ?>"required><br></td></tr>
<tr><td align="right">Ingrese segundo teléfono</td>
<td><input type="text" name="telefono2" value="<?php echo $con['telefono2']; ?>"required><br></td></tr>

<tr><td colspan="12" align="center"><H3>Datos del vehículo</H3></td></tr>

<tr><td align="right">matricula</td>
<td><input type="text" name="matricula" value="<?php echo $con['matricula']; ?>"required><br></td></tr>
<tr><td align="right">marca</td>
<td><input type="text" name="marca" value="<?php echo $con['marca']; ?>"required><br></td></tr>
<tr><td align="right">modelo</td>
<td><input type="text" name="modelo" value="<?php echo $con['modelo']; ?>"required><br></td></tr>

<tr><td colspan="12" align="center"><H3>Descripción del vehiculo</H3></td></tr>

<tr><td align="right">Tipo</td>
<td>
<select name="tipo">
<?php
if ($con['tipo']=="moto")
{
	echo "<option value=\"moto\">Moto</option>";
	echo "<option value=\"bicicleta\">Bicicleta</option>";
}
elseif ($con['tipo']=="bicicleta")
{
	echo "<option value=\"bicicleta\">Bicicleta</option>";
	echo "<option value=\"moto\">Moto</option>";
}
else
{
	echo "<option value=\"moto\">Moto</option>";
	echo "<option value=\"bicicleta\">Bicicleta</option>";
}
?>
</select>
<br>
</td></tr>
<tr><td align="right">Descripcion</td>
<td><input type="text" name="descripcion" value="<?php echo $con['descripcion']; ?>"required><br></td></tr>
<tr><td align="right">Fecha_Ingreso</td>
<td><input type="datetime" disabled="enabled" value="<?php date_default_timezone_set("America/Bogota"); echo date("d-m-Y") . " " . date("h:i:sa");  ?>" name="fecha_hora" ><br></td>
</tr>
<tr><td colspan="12" align="center"><input type="submit" value="REGISTRAR VEHICULO"><br>
</td></tr>
</table>
</form>
<p name="error" align="center"><?php if(isset($_REQUEST['error'])) { echo $_REQUEST['error'];}?></p>
</div> 
</div> 
</div> 
</div> 
</div>
</header>
</div>
</strong></em></body>
</html>