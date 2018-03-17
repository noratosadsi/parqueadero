<?php include '../controlador/control.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>NORATOS PARKING</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
<script src="bootstrap/js/bootstrap.min.js"></script>

<style type="text/css">

.inputcentrado {
   text-align: center;
   font-size: 18px;
   }
</style>

</head>
<em><strong>
<body background="vista/imagenes/tecnologia.jpg">
<div class="container">
<header>
<?php include_once 'header.php'; ?>

<div class="panel panel-default"> 
<!-- contenedor del titulo--> 

<div class="panel-body">


<!-- Contenedor ejercicio--> 
<div class="panel panel-body"> 
<div class="row alert-success"> <!-- Color fondo general--> 
<div class="col-sm-12 col-md-12"> 

<form method="post" action="../controlador/registrarsalida.php" >
<div class="panel-heading"> 
        
<table border="0" align="center">
<tr>
<?php if(isset($_REQUEST['dato1'])){ echo "<td colspan='6' align='center'>
<div class='alert alert-info'>"."REGISTRADO CORRECTAMENTE"."</div>";} 
if(isset($_REQUEST['dato'])){ echo "<td colspan='6' align='center'>
<div class='alert alert-danger'>"."Número de cédula ya se encuentra registrado"."</div>";
}?>
</td></tr>
 
<tr> 

<td align="center" style="width:70%" bgcolor="white">
<h2 align="center">NORATO'S PARKING</h2> 
</td>

<td align="center" bgcolor="white" valign="center" style="width:10%; font-size:20px">
FECHA Y HORA</td>

<td align="center" bgcolor="white">
<script type="text/javascript">
function startTime(){
today=new Date();
h=today.getHours();
m=today.getMinutes();
s=today.getSeconds();
m=checkTime(m);
s=checkTime(s);
document.getElementById('reloj').innerHTML=h+":"+m+":"+s+"<br>"+fecha;
t=setTimeout('startTime()',500);}
function checkTime(i)
{if (i<10) {i="0" + i;}return i;}
window.onload=function(){startTime();}
</script>

<div id="reloj" style="font-size:20px"></div>
<script type="text/javascript">
//<![CDATA[
var date = new Date();
var d  = date.getDate();
var day = (d < 10) ? '0' + d : d;
var m = date.getMonth() + 1;
var month = (m < 10) ? '0' + m : m;
var yy = date.getYear();
var year = (yy < 1000) ? yy + 1900 : yy;
var fecha=(day + "/" + month + "/" + year);
//]]>
</script>
</td>
</tr>
</table>
</div>


<?php
$cedula = $_POST['cedulacliente'];

include '../modelo/config.php';

 $salida=$mysql->query("select factura.*, costo.* from factura
	inner join costo on factura.costo_id=costo.id
	inner join detallefactura on factura.idFactura=detallefactura.factura_idFactura
	where vehiculo_cliente_cedula=$cedula and detallefactura.horasalida is null");
	if ($mysql->error)
	die (header ("Location: ../index.php?error2=si"));   
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
	die (header ("Location: ../index.php?error=$error"));
    echo "fue actualizado";
	
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
$con=$consulta->fetch_array();
	

	
$mysql->query("insert into historicofacturado (nomusu, apeusu, fechafacturado, cedulaclie,nomclie, apeclie, telclie1, telclie2, matricula, marca, modelo, tipo, descripcion, horaingreso, horasalida, duracion, precio, iva, total) values ('$con[nom]','$con[ape]','$con[fechafactura]','$con[cedula]','$con[nombre]','$con[apellido]','$con[telefono1]','$con[telefono2]','$con[matricula]','$con[marca]','$con[modelo]','$con[tipo]','$con[descripcion]','$con[horaingreso]','$con[horasalida]','$con[duracion]','$con[precio]','$con[iva]','$con[total]')")
    or die ($mysql->error);
	
	  
?>

<table border="0" width="95%" class="alert alert-success" align="center" Style="font-family: Arial; font-size: 10pt;"> 
<tr align="center">
<td>Cedula</td>
<td>&nbsp;&nbsp;<input type="text" name="cedulacliente" value="<?php echo $_POST["cedulacliente"]; ?>">&nbsp;&nbsp;</td>
<td rowspan="2" valign="center">
<button onclick="window.location.href='index.php'" type="button" class="btn btn-primary btn-sm">
<span class="glyphicon glyphicon-refresh"></span>&nbsp;Validar</button></td>
<td>Placa o Matricula</td>
<td>&nbsp;&nbsp;<input type="text" name="matricula" value="<?php echo $_POST["matricula"]; ?>">&nbsp;&nbsp;</td>
<td>Fecha y hora de ingreso</td>
<td>&nbsp;&nbsp;<input type="text" disabled value="<?php echo $con['horaingreso']; ?>">&nbsp;&nbsp;</td>
</tr>

<tr align="center">
<td>Nombres</td>
<td>&nbsp;&nbsp;<input type="text" name="nombre" value="<?php echo $_POST["nombre"]; ?>">&nbsp;&nbsp;</td>
<td>Marca</td>
<td>&nbsp;&nbsp;<input type="text" name="marca" value="<?php echo $_POST["marca"]; ?>">&nbsp;&nbsp;</td>
<td>Fecha y hora de salida</td>
<td>&nbsp;&nbsp;<input disabled type="datetime" name="fecha_hora" value="<?php echo $con['horasalida'] ?>">&nbsp;&nbsp;</td>
</tr>

<tr align="center">
<td>Apellidos</td>
<td>&nbsp;&nbsp;<input type="text" name="apellido" value="<?php echo $_POST["apellido"]; ?>">&nbsp;&nbsp;</td>
<td></td>
<td>Modelo</td>
<td>&nbsp;&nbsp;<input type="text" name="modelo" value="<?php echo $_POST["modelo"]; ?>">&nbsp;&nbsp;</td>
<td>Tiempo de permanencia</td>
<td>&nbsp;&nbsp;<input type="text" disabled value="<?php echo $con['duracion']?>">&nbsp;&nbsp;</td>
</tr>

<tr align="center">
<td>Telefono 1</td>
<td>&nbsp;&nbsp;<input type="text" name="telefono1" value="<?php echo $_POST["telefono1"]; ?>">&nbsp;&nbsp;</td>
<td></td>
<td>Tipo</td>
<td>&nbsp;&nbsp;<select name="tipo">
<?php
echo "<option value='$_POST[tipo]'> $_POST[tipo] </option>";
?>
</select>&nbsp;&nbsp;</td>
<td>Precio</td>
<td>&nbsp;&nbsp;<input type="text" disabled value="<?php echo "$".$con['precio']?>">&nbsp;&nbsp;</td>
</tr>

<tr align="center">
<td>Telefono 2</td>
<td>&nbsp;&nbsp;<input type="text" name="telefono2" value="<?php echo $_POST["telefono2"]; ?>">&nbsp;&nbsp;</td>
<td></td>
<td>Descripcion / Observacion</td>
<td>&nbsp;&nbsp;<input type="text" name="descripcion" value="<?php echo $_POST["descripcion"]; ?>">&nbsp;&nbsp;</td>
<td>IVA</td>
<td>&nbsp;&nbsp;<input type="text" disabled value="<?php echo "$".$con['iva']?>">&nbsp;&nbsp;</td>
</tr>
</table>


<table border="0" align="center" class="alert alert-success"> 
	<script>
		var color1="";
		var color2="";
		function change (elemento) {
			if(color1=="yellow")
			{
				elemento.style.backgroundColor=color1="#fff";
			}else{
				elemento.style.backgroundColor=color1="gray";
			}
		}
		function change2 (elemento) {
			if(color2=="yellow")
			{
				elemento.style.backgroundColor=color2="#fff";
			}else{
				elemento.style.backgroundColor=color2="yellow";
			}
		}
		
function sub(a){
 a=a-1;
  seleccion = document.getElementsByName("posicion")[a].value;
  document.getElementsByName("lugar")[0].value = seleccion;
/*  alert(+seleccion);*/

};
	</script>

<tr>
<td colspan="10" align="center" class="panel panel-default">ESTACIONAMIENTOS</td>
</tr>
<tr>
<td colspan="5" align="center" class="panel panel-default">MOTOS</td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td colspan="5" align="center" class="panel panel-default">BICICLETAS</td>
</tr>
<tr>
<td colspan="5">
<br>


<?php
		$n=80;//Cantidad de parqueaderos disponibles
		
		$x=0;
		echo "<table border='0' Style='font-family: Arial; font-size: 9pt; color:black'>";
		echo "<tr align='center'>";
		
		
		
		for ($i = 1; $i <= $n; $i++) 
		{
		$x=$x+1;				
			
			echo "<td align='center' style='width:30px'>";
			echo "<input type='button' name='posicion' onclick='sub($i);change(this);' style='width:30px' value='$i'></td>";
		
		if ($x==15) {
			echo "</tr>";
		echo "<tr align='center'>";
		$x=0;
		}
		
		} 
		echo "</table>";
		?>
       </td>

<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td>
<?php
		$n=60;//Cantidad de parqueaderos disponibles
		
		$x=0;
		echo "<table border='1'  Style='font-family: Arial; font-size: 9pt; color:black'>";
		echo "<tr align='center'>";
		for ($i = 1; $i <= $n; $i++) 
		{
		$x=$x+1;				
			
			echo "<td style='width:30px'>";
			echo "<input type='button' name='posicion' onclick='sub($i);change(this);' style='width:30px' value='$i'><!--$i--></td>";
		if ($x==15) {
			echo "</tr>";
		echo "<tr align='center'>";
		$x=0;
		}
		
		} 
		echo "</table";
		?>
       </td>
</tr>
<tr>
<td colspan="12" align="center" class="alert alert-info">
ESTACIONAMIENTO ASIGNADO <input type='text' name='lugar' class='inputcentrado' size='5' disabled>
</td>
</tr>

</table>


<table border="0" width="90%" class="alert alert-success" align="center" Style="font-family: Arial; font-size: 10pt;"> 
<tr>
<td colspan="2" align="center">TARIFAS</td>
<td></td>
<td align="center"><strong>TIPO</strong></td>
<td align="center"><strong>MOTOS</strong></td>
<td align="center"><strong>BICICLETAS</strong></td>
</tr>
<tr>
<td>Minutos</td>
<td><input type="radio" name="radio" checked="checked" /></td>
<td></td>
<td>Capacidad</td>
<td><input type="text" name="capacidadmotos" size="10"></td>
<td><input type="text" name="capacidadbici"size="10"></td>
<td>Costo segun tarifario</td>
<td><input type="text" name="costotarif"/></td>
</tr>

<tr>
<td>Horas</td>
<td><input type="radio" name="radio" /></td>
<td></td>
<td>Ocupados</td>
<td><input type="text" name="ocupadosmotos"size="10"></td>
<td><input type="text" name="ocupadosbici"size="10"></td>
<td>Valor a pagar</td>
<td><input type="text" name="apagar"/></td>
</tr>

<tr>
<td>Dias</td>
<td><input type="radio" name="radio" /></td>
<td></td>
<td>Disponible</td>
<td><input type="text" name="disponiblemotos"size="10" disabled></td>
<td><input type="text" name="disponiblebici"size="10"></td>
<td>Efectivo</td>
<td><input type="text" name="efectivo"/></td>
</tr>
</tr>

<tr>
<td>Mensualidad</td>
<td><input type="radio"name="radio"/></td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td colspan="3"></td>
<td>Cambio</td>
<td><input type="text" name="cambio"/></td>
</tr>
</table>

<br>

<table border="0" width="60%" align="center">
<tr> 
<td align="center">
<!--<button onclick="window.location.href='modelo/bd.php'" button class="btn btn-info btn-md">
INGRESAR-->
<input type="submit" class="btn btn-info btn-md" value="INGRESAR" name="ingresar">
</td> 

<td align="center"> 
<input type="submit" class="btn btn-info btn-md" value="REGISTRAR SALIDA" name="registrarsalida">
</td>

</form>

<td align="center">
<button onclick="window.location.href='vista/listado.php'" button class="btn btn-info btn-md">
PARQUEADOS
</td>

<td align="center">
<button onclick="window.location.href='vista/listadocobrados.php'" button class="btn btn-info btn-md">
COBRADOS</td> 
</tr>
<br>
</table> 

</td>
</tr>
<br>


</table> 
     


</div> 
</div> 
</div> 
</div> 
</div>
</strong></em></header>
</div>
</body>
</html>