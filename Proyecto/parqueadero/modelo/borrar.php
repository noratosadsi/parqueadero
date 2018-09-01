<?php include '../controlador/control.php'; ?>


<!--nuevo-->
<?php
     include "config.php";
   

if (isset($_REQUEST["cedulaborrar"]))
{
	borrarlista($mysql);
	header ("Location: ../vista/borrarvehiculo.php");
};


function mostrar($mysql)
{
	 $mostrar=$mysql->query("select * from vistaparqueados where numero is null")
    or die ($mysql->error);

    return $mostrar;
};

  
function borrarlista($mysql)

{
    $borrar=$mysql->query("select * from vistaparqueados where numero is null and cedula=$_REQUEST[cedulaborrar] and horasalida is not null");
    if ($mysql->error)
	die ($mysql->error/*header ("Location: ../vista/borrarvehiculo.php?error=Ingreso no válido")*/);
	$bor=$borrar->fetch_array();

    $mysql->query("delete from detallefactura
    where factura_idFactura=$bor[idFactura];");
	if ($mysql->error)
	die (header ("Location: ../vista/borrarvehiculo.php?error"));
	$mysql->query("delete from factura
    where vehiculo_cliente_cedula=$_REQUEST[cedulaborrar];")
	or die($mysql->error);
	$mysql->query("delete from estacionamiento
    where id=$bor[estacionamiento_id];")
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
    $mysql->close();
};
   //var_dump($_REQUEST["cedulaborrar"]);
    //header ("Location: ../vissta/borrarvehiculo.php");
?> 
