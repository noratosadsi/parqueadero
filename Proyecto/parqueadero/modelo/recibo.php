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
<body background="../vista/imagenes/tecnol.jpg"><em><strong>
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
<form action="../vista/recibopdf.php" method="post" target="blanko" onsubmit="window.open('', 'blanko', 'toolbar=no,menubar=no,scrollbars=notop=10px,left=40px,width=300px,height=380px')">
<!--nuevo-->
 <?php
include "config.php";

//var_dump($_SESSION["login"]);
//var_dump($_SESSION["nombre"]);

$usuario=$mysql->query("select * from usuario
where nombre='$_SESSION[login]' and apellido='$_SESSION[nombre]'")
or die($mysql->error);
$usu=$usuario->fetch_array();  


  $factura=$mysql->query("select * from vistaparqueados 
	where cedula=$_REQUEST[cedularecibo] and horaingreso='$_REQUEST[horaingreso]'")
	or die($mysql->error);
	$con=$factura->fetch_array();
  
  $total=$con["total"]+$con["iva"];
  
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
      echo $usu['nombre']." ".$usu['apellido'];
      echo '</td>';
	  echo '</tr>';
	  echo '<tr>';
	  echo '<td align="center">';
      echo 'Fecha factura';
      echo '</td>';
      echo '<td align="center">';
      echo "<input type=\"hidden\" name=\"fechafactura\" value=\"$con[fechafactura]\">";
      echo $con['fechafactura'];
      echo '</td>';
	  echo '</tr>';
	  echo '<tr>';
	  echo '<td align="center">';
      echo 'Cedula';
      echo '</td>';
      echo '<td align="center">';
      echo "<input type=\"hidden\" name=\"cedula\" value=\"$con[cedula]\">";
      echo $con['cedula'];
      echo '</td>';
	  echo '</tr>';
	  echo '<tr>';
	  echo '<td align="center">';
      echo 'Nombre';
      echo '</td>';
      echo '<td align="center">';
      echo "<input type=\"hidden\" name=\"nombre\" value=\"$con[nombre]\">";
      echo $con['nombre'];
      echo '</td>';
      echo '</tr>';
      echo '<tr>';
      echo '<td align="center">';
      echo 'Apellido';
      echo '</td>';	  
      echo '<td align="center">';
      echo "<input type=\"hidden\" name=\"apellido\" value=\"$con[apellido]\">";
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
      echo "<input type=\"hidden\" name=\"matricula\" value=\"$con[matricula]\">";
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
      echo "<input type=\"hidden\" name=\"horaingreso\" value=\"$con[horaingreso]\">";
      echo $con['horaingreso'];
      echo '</td>';
	  echo '</tr>';
	  echo '<tr>';
	  echo '<td align="center">';
      echo 'Hora salida';
      echo '</td>';
      echo '<td align="center">';
      echo "<input type=\"hidden\" name=\"horasalida\" value=\"$con[horasalida]\">";
      echo $con['horasalida'];
      echo '</td>';
	  echo '</tr>';
	  echo '<tr>';
	  echo '<td align="center">';
      echo 'Duracion';
      echo '</td>';
      echo '<td align="center">';
      echo "<input type=\"hidden\" name=\"duracion\" value=\"$con[duracion]\">";
      echo $con['duracion'];
      echo '</td>';
	  echo '</tr>';
	  echo '<tr>';
	  echo '<td align="center">';
      echo 'Precio';
      echo '</td>';
      echo '<td align="center">';
      echo "$".$con['total'];
      echo '</td>';
	  echo '</tr>';
	  echo '<tr>';
	  echo '<td align="center">';
      echo 'Iva';
      echo '</td>';
      echo '<td align="center">';
      echo "$".$con['iva'];
      echo '</td>';
	  echo '</tr>';
	  echo '<tr>';
	  echo '<td align="center">';
      echo 'Toral';
      echo '</td>';
      echo '<td align="center">';
      echo "<input type=\"hidden\" name=\"total\" value=\"$total\">";
      echo "$".$total;
      echo '</td>';	 	  
      echo '</tr>';	  
	  echo '</table>';
	  
    $mysql->close();
	
	//verifica la version de php, para imprimir la factura sólo hasta php 7.1
	if (version_compare(PHP_VERSION, '7.2.0') <= 0):
    echo "<input type=\"submit\" value=\"imprimir\" class=\"btn btn-info btn-responsive btninter\">";
	endif;
?>
</form>
</div> 
</div>
</div> 
</div> 
</div>

</header>

</div>
</strong></em></body>
</html>