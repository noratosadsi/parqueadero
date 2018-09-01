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
$consulta=$mysql->query("select count(*) as motos from vistaparqueados where numero is not null and tipo='moto';")
	or die ($mysql->error);
$mot=$consulta->fetch_array();

//consulta cuántas bicicletas hay estacionadas
$consulta2=$mysql->query("select count(*) as bicicletas from vistaparqueados where numero is not null and tipo='bicicleta';")
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

$moto=$mysql->query("select * from estacionamiento inner join cupos 
on estacionamiento.cupos_id=cupos.id where cupos.vehiculo='moto'")
	or die ($mysql->error);
	
	while ($estmot=$moto->fetch_array())
	{
		$estmoto[]=$estmot["numero"];
	};


$bicicleta=$mysql->query("select * from estacionamiento inner join cupos 
on estacionamiento.cupos_id=cupos.id where cupos.vehiculo='bicicleta'")
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
