<?php //include "../controlador/control.php";?>
<?php

//include "config.php";

//parqueaderos ocupados y disponibles

$cupos=$mysql->query("select * from cupos")
or die ($mysql->error);
$cup=$cupos->fetch_array();
		
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
	
$mdisp=$cup['motos']-$mot['motos'];
$bdisp=$cup['bicicletas']-$bic['bicicletas'];


if($mdisp==0)
{
	$mdisp="sin cupo";
}

if ($bdisp==0)
{
    $bdisp="sin cupo";
}

//ver el número del parqueadero 
$moto=$mysql->query("select estacionamiento from parqueados where tipo='moto'")
	or die ($mysql->error);

	while ($estmot=$moto->fetch_array())
	{
		$estmoto[]=$estmot["estacionamiento"];
	}
	
$bicicleta=$mysql->query("select estacionamiento from parqueados where tipo='bicicleta'")
	or die ($mysql->error);

	while ($estbic=$bicicleta->fetch_array())
	{
		$estbicicleta[]=$estbic["estacionamiento"];
	}





/*CALCULO COSTOS bicicleta*/
$costo=$mysql->query("select * from costo where vehiculo='bicicleta'")
or die ($mysql->error);
$cosb=$costo->fetch_array();


echo $cosminb= $cosb["pmin"].'<br>';
echo $coshorasb= $cosb["phoras"].'<br>';
echo $cosdiasb= $cosb["pdias"].'<br>';
echo $cosmensualb= $cosb["pmensual"].'<br>'.'<br>';

/*CALCULO COSTOS motos*/
$costo=$mysql->query("select * from costo where vehiculo='moto'")
or die ($mysql->error);
$cosm=$costo->fetch_array();


echo $cosminm= $cosm["pmin"].'<br>';
echo $coshorasm= $cosm["phoras"].'<br>';
echo $cosdiasm= $cosm["pdias"].'<br>';
echo $cosmensualm= $cosm["pmensual"].'<br>';

//$mysql->close();	
?>
