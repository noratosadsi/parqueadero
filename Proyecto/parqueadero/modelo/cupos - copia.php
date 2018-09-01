<?php //include "../controlador/control.php";?>
<?php
error_reporting(4);
/*include "config.php";*/
//consulta los cupos totales disponibles 
/*$cupos=$mysql->query("select * from cupos")
or die ($mysql->error);
$cup=$cupos->fetch_array();*/

//consulta los cupos totales de estacionamientos disponibles para las motos
$cuposmoto=$mysql->query("select * from cupos where vehiculo='moto'")
or die ($mysql->error);
$cupm=$cuposmoto->fetch_array();

//consulta los cupos totales de estacionamientos disponibles para las bicicletas 
$cuposbici=$mysql->query("select * from cupos where vehiculo='bicicleta'")
or die ($mysql->error);
$cupb=$cuposbici->fetch_array();


//consulta cuántas motos hay estacionadas
$consulta=$mysql->query("select count(*) as motos from cliente 
inner join vehiculo on cliente.cedula=vehiculo.cliente_cedula
inner join factura on vehiculo.cliente_cedula=factura.vehiculo_cliente_cedula
inner join detallefactura on factura.idFactura=detallefactura.factura_idFactura
inner join tipo on vehiculo.cliente_cedula=tipo.vehiculo_cliente_cedula
where horasalida is null and tipo='moto';")
	or die ($mysql->error);
$mot=$consulta->fetch_array();

//consulta cuántas bicicletas hay estacionadas
$consulta2=$mysql->query("select count(*) as bicicletas from cliente 
inner join vehiculo on cliente.cedula=vehiculo.cliente_cedula
inner join factura on vehiculo.cliente_cedula=factura.vehiculo_cliente_cedula
inner join detallefactura on factura.idFactura=detallefactura.factura_idFactura
inner join tipo on vehiculo.cliente_cedula=tipo.vehiculo_cliente_cedula
where horasalida is null and tipo='bicicleta';")
	or die ($mysql->error);
$bic=$consulta2->fetch_array();
	
//muestra los estacionamientos disponibles para motos
$mdisp=$cupm['cantidad']-$mot['motos'];
//muestra los estacionamientos disponibles para bicicletas
$bdisp=$cupb['cantidad']-$bic['bicicletas'];


if($mdisp==0)
{
	$mdisp="no hay estacionamientos disponibles para motos";
}

if ($bdisp==0)
{
    $bdisp="no hay estacionamientos disponibles para bicicletas";
}

//ver el número del parqueadero 

$moto=$mysql->query("select * from estacionamiento where vehiculo='moto'")
	or die ($mysql->error);
	
	while ($estmot=$moto->fetch_array())
	{
		$estmoto[]=$estmot["numero"];
	};


/*
$moto=$mysql->query("select estacionamiento from parqueados where tipo='moto'")
	or die ($mysql->error);
	
	while ($estmot=$moto->fetch_array())
	{
		$estmoto[]=$estmot["estacionamiento"];
	}


*/	
$bicicleta=$mysql->query("select * from estacionamiento where vehiculo='bicicleta'")
	or die ($mysql->error);

	while ($estbic=$bicicleta->fetch_array())
	{
		$estbicicleta[]=$estbic["numero"];
	}


/*CALCULO COSTOS bicicleta*/
$costo=$mysql->query("select * from costo where vehiculo='bicicleta'")
or die ($mysql->error);
$cosb=$costo->fetch_array();


$cosminb= $cosb["pmin"];
$coshorasb= $cosb["phoras"];
$cosdiasb= $cosb["pdias"];
$cosmensualb= $cosb["pmensual"];

/*CALCULO COSTOS motos*/
$costo=$mysql->query("select * from costo where vehiculo='moto'")
or die ($mysql->error);
$cosm=$costo->fetch_array();


$cosminm= $cosm["pmin"];
$coshorasm= $cosm["phoras"];
$cosdiasm= $cosm["pdias"];
$cosmensualm= $cosm["pmensual"];

//$mysql->close();	



?>
