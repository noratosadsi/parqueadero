<?php include '../controlador/control.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Mi Proyecto</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
<script src="bootstrap/js/bootstrap.min.js"></script>
</head>
<body background="imagenes/tecnol.jpg"><em><strong>
<div class="container">
<header>
<?php include_once 'header.php'; ?>
<div class="col-sm-15 col-md-15"> 
<div class="panel panel-default"> 
<!-- contenedor del titulo--> 
<div class="panel-heading"> 
<h2 align="center">PRECIO</h2> 
</div> 
<div class="panel-body"> 
<!-- Contenedor ejercicio-->
<div class="alert alert-success"> 
<div class="row"> 
<div class="col-sm-15 col-md-15">  
<!--nuevo-->	
<form action="../modelo/cambiarprecio.php" method="post">
<table align="center" width="900"> 
<tr>
</td>
<td rowspan="2" align="center" valign="middle" name="prueba" width="270">	
<?php
include "../modelo/config.php";

$result1=$mysql->query("select * from costo where vehiculo='moto'")
	or die($mysql->error." error seleccionando costo");
	$res1=$result1->fetch_array();
	
	$result2=$mysql->query("select * from costo where vehiculo='bicicleta'")
	or die($mysql->error." error seleccionando costo");
	$res2=$result2->fetch_array();

?>
<table border="2" align="center" cellspacing="1">
<tr><td align="center" colspan="2">Costo actual por minuto</td>
<td align="center" colspan="2">Costo actual por hora</td>
<td align="center" colspan="2">Costo actual por dia</td>
<td align="center" colspan="2">Costo actual al mes</td></tr>

<tr><td align="center">Moto</td><td align="center">Bicicleta</td>
<td align="center">Moto</td><td align="center">Bicicleta</td>
<td align="center">Moto</td><td align="center">Bicicleta</td>
<td align="center">Moto</td><td align="center">Bicicleta</td></tr></tr>
<tr></td>
<td align="center"><input type="text" style="text-align:center" name="motosmin" size="10" value="<?php echo $res1['pmin'];?>"></td>
<td align="center"><input type="text" style="text-align:center" name="bicicletasmin" size="10" value="<?php echo $res2['pmin'];?>"></td>
<td align="center"><input type="text" style="text-align:center" name="motoshoras" size="10" value="<?php echo $res1['phoras'];?>"></td>
<td align="center"><input type="text" style="text-align:center" name="bicicletashoras" size="10" value="<?php echo $res2['phoras'];?>"></td>
<td align="center"><input type="text" style="text-align:center" name="motosdias" size="10" value="<?php echo $res1['pdias'];?>"></td>
<td align="center"><input type="text" style="text-align:center" name="bicicletasdias" size="10" value="<?php echo $res2['pdias'];?>"></td>
<td align="center"><input type="text" style="text-align:center" name="motosmes" size="10" value="<?php echo $res1['pmensual'];?>"></td>
<td align="center"><input type="text" style="text-align:center" name="bicicletasmes" size="10" value="<?php echo $res2['pmensual'];?>"></td>
<tr></tr>
</table>
<tr><br></tr>
<br>
</table>
<br>
<table align="center">
<tr><td><br><input type="submit" value="ACTUALIZAR"  class="btn btn-info" align="center" name="actualizar"></br></td></tr>
</table>
</form>
<p name="error" align="center">

<?php
if (isset($_REQUEST["error"])){ echo "<script>alert('error actualizando costo');</script>";};

if (isset($_REQUEST["actualizado"])){ echo "<script>alert('se ha actualizado el precio');</script>";};
?>
</p>
</div> 
</div> 
</div> 
</div> 
</div>
</header>
</div>
</strong></em>
</body>
</html>