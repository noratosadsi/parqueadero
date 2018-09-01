<?php include 'controlador/control.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>NORATOS PARKING</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php date_default_timezone_set("America/Bogota")?>
<link href="vista/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
<script src="vista/bootstrap/js/bootstrap.min.js"></script>

<!--NUEVO SCRIPT JQUERY-->
<script src="vista/bootstrap/css/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<style type="text/css">
.inputcentrado {
   text-align: center;
   font-size: 18px;
   background-color: #E9E9E9;
   }

</style>

</head>
<em><strong>
<body background="vista/imagenes/tecnol.jpg">
<div class="container">
<header>
<?php include_once 'vista/header.php'; ?>

<div class="panel panel-default"> 
<!-- contenedor del titulo--> 

<div class="panel-body">


<!-- Contenedor ejercicio--> 
<div class="panel panel-body"> 
<div class="row alert-primary"> <!-- Color fondo general--> 
<div class="col-sm-12 col-md-12"> 



<form name="form1" action="" method="post">
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


$cedula = $_POST['cedulaactualizar'];
$lugar= $_POST['lugar'];


include 'modelo/config.php';

//consulta si el vehículo está estacionado por el número de cédula

function consulta($mysql)
{
	if(isset($_POST["lugar"]))
	{
		$vehiculo="moto";

	};

	if(isset($_POST["posicion2"]))
	{
		$vehiculo="bicicleta";
	};
	$cedula = $_POST['cedulaactualizar'];
    $lugar= $_POST['lugar'];

$consulta=$mysql->query("select * from vistaparqueados where numero is not null and cedula='$cedula' or vehiculo ='$vehiculo' and numero='$lugar';")
	  or die ($mysql->error."sadfasdhfhasdhfh 123");



 /*   $tipo="tipo.tipo";

	$consulta=$mysql->query("select * from estacionamiento inner join factura
    on estacionamiento.id=factura.estacionamiento_id inner join vehiculo
    on factura.vehiculo_cliente_cedula=vehiculo.cliente_cedula
    inner join tipo on vehiculo.cliente_cedula=tipo.vehiculo_cliente_cedula
    inner join detallefactura on factura.idFactura=detallefactura.factura_idFactura
    inner join cliente on vehiculo.cliente_cedula=cliente.cedula
    where vehiculo.cliente_cedula='$cedula' and estacionamiento.vehiculo='$tipo'")
	  or die ($mysql->error."sadfasdhfhasdhfh 123 $cedula $lugar");
	*/
	return $consulta;
};

$reg=consulta($mysql)->fetch_array();
	
/*

$consulta=$mysql->query("select * from parqueados
      where cedulaclie='$cedula' or estacionamiento='$lugar'")
	  or die ($mysql->error);
	$reg=$consulta->fetch_array();

$consulta2=$mysql->query("select * from historicofacturado
      where cedulaclie='$cedula'")
	  or die ($mysql->error);
	$reg1=$consulta2->fetch_array();*/
	
	
//consulta el costo seleccionado 

$costo=$mysql->query("select * from costo where vehiculo='$reg[tipo]'")
	  or die ($mysql->error);
	$cos=$costo->fetch_array();
	
	

	//comprueba si el vehículo está estacionado para registrar su salida

	if ($reg>0)
	{

		/*	$consulta=$mysql->query("select * from estacionamiento 
inner join factura
on estacionamiento.id=factura.estacionamiento_id
inner join vehiculo
on factura.vehiculo_cliente_cedula=vehiculo.cliente_cedula
inner join tipo
on vehiculo.cliente_cedula=tipo.vehiculo_cliente_cedula
where factura.vehiculo_cliente_cedula=$cedula or estacionamiento.numero=$lugar")
	or die ($mysql->error." aqui esta el error: Fallo al accesar al sistema  ".$mysql->errno);
		
		
	$consulta=$mysql->query("select * from parqueados where cedulaclie='$cedula' or estacionamiento='$lugar'")
	or die ($mysql->error);

	$con=$consulta->fetch_array();*/

//guarda la consulta en la variable $con para realizar la salida del vehículo


    $con=consulta($mysql)->fetch_array();

	$cedula=$reg["vehiculo_cliente_cedula"];
	$horaing =$con['horaingreso'];
	$horaingreso = date("d/m/Y H:i:s",strtotime($horaing));
	$horasalida =date('d/m/Y H:i:s');
	
	//deshabilita si el vehiculo se encuentra parqueado
	$readonly="readonly";
	
	//cambia el estilo de la caja de caja de texto a gris
	
	$estilo="style='background-color: #E9E9E9'";
	
	//required para que pida el efectivo
	
	$required="required";
	
	//calcular el precio dependiendo si es por minutos, dias, horas o mes
	
	//calcular por minutos
	if ($con["precio"]==$cos["pmin"])
	{
		$precio=$cos['pmin']/60;
	};
	//calcular por horas
	if ($con["precio"]==$cos["phoras"])
	{
		$hora=$cos['phoras']/60;
		$precio=$hora/60;
	};
	//calcular por dias
	if ($con["precio"]==$cos["pdias"])
	{
		$dia=$cos['pdias']/1440;
		$precio=$dia/60;
	};
	//calcular po mes
	if ($con["precio"]==$cos["pmensual"])
	{
		$mes=$cos['pmensual']/43800;
		$precio=$mes/60;
	};

	//actualiza los datos registrando la salida del vehículo
	
/*

	$mysql->query("update parqueados
    set horasalida=now(),
    duracion=timediff(horasalida,horaingreso),
	total=time_to_sec(duracion)*$precio,
    iva=total*0.19
    where cedulaclie=$cedula;");
	if ($mysql->error)
	die (header ("Location: index.php?error=no se pudo actualizar la tabla parqueados"));

	*/

	 $mysql->query("update detallefactura inner join factura
    on detallefactura.factura_idFactura=factura.idFactura 
    set fechafactura=now(),
	horasalida=now(),
    duracion=timediff(horasalida,horaingreso),
	total=time_to_sec(duracion)*$precio,
    iva=total*0.19
    where idFactura=$con[idFactura];");
	if ($mysql->error)
		die ("errorrrrr  ".$con["precio"]."| no aparece el precio");
	//die (header ("Location: index.php?error=no se pudo actualizar la tabla parqueados"));

	/*
	$actualizar=$mysql->query("select * from parqueados where cedulaclie='$cedula'")
	or die ($mysql->error);
	$act=$actualizar->fetch_array();*/

    //suma el precio con iva
	
	//$total=$act["total"]+$act["iva"];	
	
/*  $actualizar=$mysql->query("select * from estacionamiento inner join factura
    on estacionamiento.id=factura.estacionamiento_id inner join vehiculo
    on factura.vehiculo_cliente_cedula=vehiculo.cliente_cedula
    inner join tipo on vehiculo.cliente_cedula=tipo.vehiculo_cliente_cedula
    inner join detallefactura on factura.idFactura=detallefactura.factura_idFactura
    where vehiculo.cliente_cedula=$cedula")
	  or die ($mysql->error."sadfasdhfhasdhfh 12345 $cedula $lugar");  */

consulta($mysql);
$act=consulta($mysql)->fetch_array();
$total=$act["total"]+$act["iva"];	

//deshabilita el botón de ingresar vehiculo al parqueadero
$deshabilitar="disabled";

   // $act=$actualizar->fetch_array();
    
    //$total=$act["total"];

	/*echo $horasalida,"esta";*/
	echo '<script class="color">alert("Vehiculo parqueado");</script>';
	} 

	else{

		/* $consulta2=$mysql->query("select * from historicofacturado
	  where cedulaclie='$cedula'")
	  or die ($mysql->error); */
		
	/* 	if (isset($reg1["cedulaclie"])){
			$cedula=$reg1["cedulaclie"];
		}
		else {
			$cedula=$_POST["cedulaactualizar"];
			echo '<script language="javascript">alert("Usuario NO existe");</script>';
		};
		 */

		$consulta2=$mysql->query("select * from vistaparqueados where cedula='$cedula' and numero is null;")
		or die ($mysql->error);
	   $reg1=$consulta2->fetch_array();

	   if (isset($reg1["cedula"])){
		$cedula=$reg1["cedula"];
	   }
	   else {
		$cedula=$_POST["cedulaactualizar"];
		echo '<script language="javascript">alert("Usuario NO existe");</script>';
	    };


		//deshabilita la opcion de ingresar efectivo antes de ingresar el vehiculo
		$disabled="disabled";
        		
		/* $consulta1=$mysql->query("select * from historicofacturado where cedulaclie='$cedula'")
		or die ($mysql->error);
		$con=$consulta1->fetch_array();
		$horaingreso =date('d/m/Y H:i:s'); */
		/*$horasalida ="NO PARQUEADO";*/

		$consulta1=$mysql->query("select * from vistaparqueados where cedula='$cedula' and numero is null;")
		or die ($mysql->error);
		$con=$consulta1->fetch_array();
		$horaingreso =date('d/m/Y H:i:s');

		echo '<script language="javascript">alert("Vehiculo NO parqueado, por favor ingrese datos");</script>'; 
		}

//cupos
	
include "modelo/cupos.php";  

?>

<table border="0" width="95%" class="alert alert-primary" align="center" Style="font-family: Arial; font-size: 10pt;"> 
<tr align="center">
<td>Cedula</td>
<td>&nbsp;&nbsp;<input type="text" name="cedulacliente" value="<?php echo $cedula; ?>" readonly>&nbsp;&nbsp;</td>
<td rowspan="2" valign="center">
<button onclick="window.location.href='index.php'" type="button" class="btn btn-primary btn-sm" disabled>
<span class="glyphicon glyphicon-refresh"></span>&nbsp;Validar</button></td>
<td>Placa o Matricula</td>
<td>&nbsp;&nbsp;<input type="text" name="matricula" value="<?php echo $con['matricula']; ?>" <?php echo $estilo, $readonly;?>>&nbsp;&nbsp;</td>

<td>Fecha y hora de Ingreso</td>
<td>&nbsp;&nbsp;<input name="horaingreso" type="datetime" value="<?php echo $horaingreso;?>" readonly style="background-color: #E9E9E9">&nbsp;&nbsp;</td>

</tr>

<tr align="center">
<td>Nombres</td>
<td>&nbsp;&nbsp;<input type="text" name="nombre" value="<?php echo $con['nombre']; ?>" <?php echo $estilo, $readonly;?>>&nbsp;&nbsp;</td>
<td>Marca</td>
<td>&nbsp;&nbsp;<input type="text" name="marca" value="<?php echo $con['marca']; ?>" <?php echo $estilo, $readonly;?>>&nbsp;&nbsp;</td>


<td>Fecha y hora de salida</td>
<td>&nbsp;&nbsp;<input type="datetime" value="<?php echo $horasalida;?>" name="fecha_hora" readonly style="background-color: #E9E9E9">&nbsp;&nbsp;</td>
</tr>

<tr align="center">
<td>Apellidos</td>
<td>&nbsp;&nbsp;<input type="text" name="apellido" value="<?php echo $con['apellido']; ?>" <?php echo $estilo, $readonly;?>>&nbsp;&nbsp;</td>
<td></td>
<td>Modelo</td>
<td>&nbsp;&nbsp;<input type="text" name="modelo" value="<?php echo $con['modelo']; ?>" <?php echo $estilo, $readonly;?>>&nbsp;&nbsp;</td>
<td>Tiempo de permanencia</td>
<td>&nbsp;&nbsp;<input type="text" name="permanencia" value="<?php echo $act["duracion"]; ?>" readonly style="background-color: #E9E9E9">&nbsp;&nbsp;</td>
</tr>

<tr align="center">
<td>Telefono 1</td>
<td>&nbsp;&nbsp;<input type="text" name="telefono1" value="<?php echo $con['telefono1']; ?>" <?php echo $estilo, $readonly;?>>&nbsp;&nbsp;</td>
<td></td>
<td>Tipo</td>
<!--CAMPO TIPO VEHICULO SELECCIONADO-->
<input type="hidden" id="veh" name="vehiculo1" >

<td>&nbsp;&nbsp;<select onchange="myFunction()" id="vehiculo" name="tipo">
<?php 

//muestra ambos vehículos para seleccionar en caso de que el vehículo ingrese al parqueadero

if(!isset($con["numero"]))
{
	echo "<option value=''></option>";
	echo "<option value=\"moto\">moto</option>";
	echo "<option value=\"bicicleta\">bicicleta</option>";
}
?>
<script>
function myFunction() {

if((
(document.getElementById("r1").checked == true) 
|  (document.getElementById("r2").checked == true) 
|  (document.getElementById("r3").checked == true) 
| (document.getElementById("r4").checked == true)
) &
(document.form1.tipo.value != "")
 )
{

   

//Valida radio checkeado	
	o = document.forms[0].tarifa;
	for(i=0;i<o.length;i++){
		if(o[i].checked){
			var sel =(o[i].value);
			//alert("Ha seleccionado "+sel);
			//alert("Ha seleccionado "+o[i].value);
document.getElementsByName("tarifa1")[0].value = sel;			
			break;
		}
	}	

//Valida opcion seleccionada	
    var x = document.getElementById("vehiculo").selectedIndex;
    //alert(document.getElementsByTagName("option")[x].value);
	vehiculo = (document.getElementsByTagName("option")[x].value);
	//alert (vehiculo);
	document.getElementsByName("vehiculo1")[0].value = vehiculo;



// Calcula costo	
var veh = document.getElementById('veh').value;
var tar = document.getElementById('tar').value;

//Inicio

//MOTOS
if ((veh=='moto')&& (tar=='minutos')) {
var z = "<?php echo $cosminm;?>";
document.getElementsByName("costotarif")[0].value = z;	  
} 

if ((veh=='moto')&& (tar=='horas')) {
var z = "<?php echo $coshorasm; ?>";
document.getElementsByName("costotarif")[0].value = z;
} 

if ((veh=='moto')&& (tar=='dias')) {
var z = "<?php echo $cosdiasm; ?>";
document.getElementsByName("costotarif")[0].value = z;
} 

if ((veh=='moto')&& (tar=='mes')) {
var z = "<?php echo $cosmensualm; ?>";
document.getElementsByName("costotarif")[0].value = z;
} 

//BICICLETAS
if ((veh=='bicicleta')&& (tar=='minutos')) {
var z = "<?php echo $cosminb; ?>";
document.getElementsByName("costotarif")[0].value = z;	  
} 

if ((veh=='bicicleta')&& (tar=='horas')) {
var z = "<?php echo $coshorasb; ?>";
document.getElementsByName("costotarif")[0].value = z;
} 

if ((veh=='bicicleta')&& (tar=='dias')) {
var z = "<?php echo $cosdiasb; ?>";
document.getElementsByName("costotarif")[0].value = z;
} 

if ((veh=='bicicleta')&& (tar=='mes')) {
var z = "<?php echo $cosmensualb; ?>";
document.getElementsByName("costotarif")[0].value = z;
} 
//fin
}

 else{
		if 
		((document.getElementById("r1").checked == true) 
		|  (document.getElementById("r2").checked == true) 
		|  (document.getElementById("r3").checked == true) 
		| (document.getElementById("r4").checked == true)
		){
		alert ("Debe seleccionar un tipo de Vehiculo");
		 document.getElementById('vehiculo').focus();
		}
		else{
			alert ("Debe seleccionar una Tarifa");
			document.getElementById('r1').focus();
			}
 }

}

</script>


<?php
//muestra el vehículo parqueado sin opción de seleccionar otro vehículo


if (isset($con["numero"]))
{
	if ($con['vehiculo']=="moto")
	{
		echo "<option value=\"moto\">moto</option>";
    }
	if ($con['vehiculo']=="bicicleta")
    {
		echo "<option value=\"bicicleta\">bicicleta</option>";
    }
}
?>
</select>&nbsp;&nbsp;</td>
<td>Precio</td>
<td>&nbsp;&nbsp;<input type="text" name="precio" value="<?php echo "$".$act["total"];?>" readonly style="background-color: #E9E9E9">&nbsp;&nbsp;</td>
</tr>

<tr align="center">
<td>Telefono 2</td>
<td>&nbsp;&nbsp;<input type="text" name="telefono2" value="<?php echo $con['telefono2']; ?>" <?php echo $estilo, $readonly;?>>&nbsp;&nbsp;</td>
<td></td>
<td>Descripcion / Observacion</td>
<td>&nbsp;&nbsp;<input type="text" name="descripcion" value="<?php echo $con['descripcion']; ?>" <?php echo $estilo, $readonly;?>>&nbsp;&nbsp;</td>
<td>IVA</td>
<td>&nbsp;&nbsp;<input type="text" name="iva" value="<?php echo "$".$act["iva"];?>" readonly style="background-color: #E9E9E9">&nbsp;&nbsp;</td>
</tr>
</table>


<table border="0" align="center" class="alert alert-default"> 
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
		
//muestra los numeros de estacionamiento de las motos
function sub(a){
 a=a-1;
 //obtiene el numero de estacionamiento para las motos
 seleccionmoto = document.getElementsByName("posicion")[a].value;
 //muestra el numero de estacionamiento seleccionado para motos
document.getElementsByName("lugar")[0].value = seleccionmoto;

/*  alert(+seleccion);*/

};

//muestra los numeros de estacionamiento de las bicicletas
function subb(b){

b=b-1;

//obtiene el numero de estacionamiento apra las bicicletas
seleccionbici = document.getElementsByName("posicionb")[b].value;
//muestra el numero de estacionamiento seleccionado para bicicletas
document.getElementsByName("lugar")[0].value = seleccionbici;

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

<?php

//consulta si está estacionado


	/*  $estacionado=$mysql->query("select * from parqueados where cedulaclie=$cedula")
	 or die ($mysql->error); */

	 $estacionado=consulta($mysql);


		$m=$cupm["cantidad"];//Cantidad de parqueaderos disponibles para motos
		
		$x=0;
		echo "<table border='0' Style='font-family: Arial; font-size: 9pt; color:black'>";
		echo "<tr align='center'>";
		
		
		for ($i = 1; $i <= $m; $i++) 
		{
			$x=$x+1;
			
			if ($verificar=$estacionado->num_rows)
			{
				$usar="";
			}	
			else
			{
				$usar="onclick='sub($i);change(this);'";
			}			
			
			if (in_array($i, $estmoto))
			{
				echo "<td align='center' style='width:30px' bgcolor='gray' name='posicion'>";
			    echo "$i </td>";
			}
			else
			{
				echo "<td align='center' style='width:30px'>";
			    echo "<input type='button' name='posicion' $usar style='width:30px' value='$i'></td>";	
			}
			
			
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
		$b=$cupb["cantidad"];//Cantidad de parqueaderos disponibles para bicicletas
		
		$x=0;
		echo "<table border='0'  Style='font-family: Arial; font-size: 9pt; color:black'>";
		echo "<tr align='center'>";
		
		for ($i = 1; $i <= $b; $i++) 
		{
			$x=$x+1;
			
			if ($verificar=$estacionado->num_rows)
			{
				$usar="";
			}	
			else
			{
				$usar="onclick='subb($i);change(this);'";
			}
			
			
			if (in_array($i, $estbicicleta))
			{
				echo "<td style='width:30px' bgcolor='gray' name='posicionb'>";
			    echo "$i</td>";
			}
			else
			{
				echo "<td style='width:30px'>";
			    echo "<input type='button' name='posicionb' $usar style='width:30px' value='$i'><!--$i--></td>";
			}
		
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
ESTACIONAMIENTO ASIGNADO
<input type='text' name='lugar' class='inputcentrado' size='5' value="<?php if (isset ($con['numero'])){ echo ($con['numero']);}else { echo "no estacionado";}?>" id="id" onkeypress="return false;" readonly>

</td>
</tr>

</table>


<table border="0" width="90%" class="alert alert-primary" align="center" Style="font-family: Arial; font-size: 10pt;"> 
<tr>
<td colspan="2" align="center">TARIFAS</td>
<td></td>
<td align="center"><strong>TIPO</strong></td>
<td align="center"><strong>MOTOS</strong></td>
<td align="center"><strong>BICICLETAS</strong></td>
</tr>
<tr>

<!--CAMPO TARIFA SELECCIONADA-->
<input type="hidden" id="tar" name="tarifa1" >
<td>Minutos</td>
<td><input type="radio" id="r1" onclick="myFunction()" name="tarifa" value="minutos" <?php if (isset($con["precio"])){if($con["precio"]==$cos["pmin"]){ echo "checked";}else  {echo $deshabilitar;}} ?>></td><!--checked="checked"-->
<td></td>
<td>Capacidad</td>
<td><input type="text" style="text-align:center" name="capacidadmotos" size="10" value="<?php echo $cupm['cantidad'];?>" disabled></td>
<td><input type="text" style="text-align:center" name="capacidadbici"size="10" value="<?php echo $cupb['cantidad'];?>" disabled></td>


<td>Costo segun tarifario</td>
<td><input type="text" name="costotarif" value="<?php if(isset($act["precio"])){ echo $act["precio"];} ?>" style="text-align:center;background-color: #E9E9E9" readonly></td>
<!--<td><input type="text" name="costotarif" value="<?/*php echo $costo*/?>" style="text-align:center" readonly></td>-->

</tr>

<tr>
<td>Horas</td>
<td><input type="radio" id="r2" onclick="myFunction(this)" name="tarifa" value="horas" <?php if (isset($con["precio"])){ if($con["precio"]==$cos["phoras"]){ echo "checked";}else {echo $deshabilitar;}} ?>></td>
<td></td>
<td>Ocupados</td>
<td><input type="text" name="ocupadosmotos"size="10" value="<?php echo $mot["motos"]?>" style="text-align:center" disabled></td>
<td><input type="text" name="ocupadosbici"size="10" value="<?php echo $bic["bicicletas"]?>" style="text-align:center" disabled></td>
<td>Valor a pagar</td>
<td><input type="text" name="apagar" value="<?php echo $total?>" readonly style="text-align:center;background-color: #E9E9E9" /></td>
</tr>
<tr>
<td>Dias</td>
<td><input type="radio" id="r3" onclick="myFunction()" name="tarifa" value="dias" <?php if (isset($con["precio"])){if($con["precio"]==$cos["pdias"]){ echo "checked";}else {echo $deshabilitar;}} ?>></td>
<td></td>
<td>Disponible</td>
<td><input type="text" name="disponiblemotos"size="10" disabled value="<?php echo $mdisp?>" style="text-align:center"></td>
<td><input type="text" name="disponiblebici"size="10" disabled value="<?php echo $bdisp?>" style="text-align:center"></td>
<td>Efectivo</td>
<td><input type="text" name="efectivo" <?php echo $required, $disabled;?>></td>
</tr>
</tr>

<tr>
<td>Mensualidad</td>
<td><input type="radio" id="r4" onclick="myFunction()" name="tarifa" value="mes" <?php if (isset($con["precio"])){ if($con["precio"]==$cos["pmensual"]){ echo "checked";}else {echo $deshabilitar;}}?>></td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td colspan="3"></td>
<td>Cambio</td>
<td><input type="text" name="cambio" style="text-align:center;background-color: #E9E9E9" readonly></td>
</tr>
</table>

<br>

<table border="0" width="60%" align="center">
<tr> 
<td align="center">

<input type="submit" class="btn btn-info btn-md" value="INGRESAR" name="ingresar" onclick="this.form.action='modelo/bd.php'" <?php echo $deshabilitar; ?>>
</td> 

<td align="center"> 
<input type="submit" class="btn btn-info btn-md" value="REGISTRAR SALIDA" onclick="this.form.action='vista/salida.php'" <?php echo $disabled; ?>>
</td>



<td align="center">
<a type="button" href="vista/listado.php" target="_blank" class="btn btn-info btn-md">PARQUEADOS</a>
</td>

<td align="center">
<a type="button" href="vista/listadocobrados.php" target="_blank" button class="btn btn-info btn-md">COBRADOS</a>
</td> 
</tr>
<br>
</table> 

</td>
</tr>
<br>


</table> 
     
</form>

</div> 
</div> 
</div> 
</div> 
</div>
</strong></em></header>
</div>
</body>
</html>