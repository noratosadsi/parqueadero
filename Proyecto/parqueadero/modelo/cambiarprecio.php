 <?php
include "../controlador/control.php";
include "config.php";


//cambiar el costo de la moto por minuto
if (isset($_POST["motosmin"]))
{
	$mysql->query("update costo set pmin=$_POST[motosmin] where vehiculo='moto'");
	if($mysql->error)
	{
		echo "<script>alert('error actualizando costo por minuto en motos');</script>";
	    $motosmin="motosmin";
	}
}
//cambiar el costo de la bicicleta por minuto
if (isset($_POST["bicicletasmin"]))
{
	$mysql->query("update costo set pmin=$_POST[bicicletasmin] where vehiculo='bicicleta'");
	if($mysql->error)
	{
		echo "<script>alert('error actualizando costo por minuto en bicicletas');</script>";
	    $bicicletasmin="bicicletasmin";
	}
}
//cambiar el costo de la moto por hora
if ($_POST["motoshoras"])
{
	$mysql->query("update costo set phoras=$_POST[motoshoras] where vehiculo='moto'");
	if($mysql->error)
	{
		echo "<script>alert('error actualizando costo por horas en motos');</script>";
		$motoshoras="motoshoras";
	}
}
//cambiar el costo de la bicicleta por hora
if ($_POST["bicicletashoras"])
{
	$mysql->query("update costo set phoras=$_POST[bicicletashoras] where vehiculo='bicicleta'");
	if($mysql->error)
	{
		$bicicletashoras="bicicletashoras";
	}
}
//cambiar el costo de la moto por dias
if ($_POST["motosdias"])
{
	$mysql->query("update costo set pdias=$_POST[motosdias] where vehiculo='moto'");
	if($mysql->error)
	{
		$motosdias="motosdias";
	}
}
//cambiar el costo de la bicicleta por dias
if ($_POST["bicicletasdias"])
{
	$mysql->query("update costo set pdias=$_POST[bicicletasdias] where vehiculo='bicicleta'");
	if($mysql->error)
	{
		$bicicletasdias="bicicletasdias";
	}
}
//cambiar el costo de la moto por mes
if (isset($_POST["motosmes"])) 
{
	$mysql->query("update costo set pmensual=$_POST[motosmes] where vehiculo='moto'");
	if($mysql->error)
	{
		$motosmes="motosmes";
	}
}
//cambiar el costo de la bicicleta por mes
if (isset($_POST["bicicletasmes"]))
{
	$mysql->query("update costo set pmensual=$_POST[bicicletasmes] where vehiculo='bicicleta'");
	if($mysql->error)
	{
		$bicicletasmes="bicicletasmes";
	}
}


 if (isset($motosmin) or isset($bicicletasmin) or isset($motoshoras) or isset($bicicletashoras) or isset($motosdias) or isset($bicicletasdias) or isset($motosmes)  or isset($bicicletasmes))
{
	//redirige a la pagina precio.php en caso de encontrar algún error
	header ("Location: ../vista/precio.php?error");
}
else
{
	//redirige a la pagina precio.php confirmando la actualización si no hay errores
	header ("Location: ../vista/precio.php?actualizado");
};

?>