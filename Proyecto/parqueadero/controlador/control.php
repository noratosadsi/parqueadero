<?php
$menuadministrador=basename($_SERVER['PHP_SELF']);
$ubicacion=dirname($_SERVER['PHP_SELF']);

if (!isset($_SESSION))
{
	session_start(); 
}
if ($_SESSION["validar"]!="true") { 

//revisa si esta ubicado en index y form1
if ($menuadministrador=="index.php" or $menuadministrador=="form1.php")
{
	header("Location: vista/seguridad.php");
}
//revisa si esta ubicado en la carpeta controlador o modelo
if ($ubicacion=="/parqueadero/controlador" or $ubicacion=="/parqueadero/modelo")
{
	header("Location: ../vista/seguridad.php");
}
//revisa si esta ubicado en la carpeta vista
if ($ubicacion=="/parqueadero/vista")
{
	header("Location: seguridad.php");
}

exit();
}	


if ($_SESSION["nivel"]==2)
{
	if ($menuadministrador=="precio.php" or $menuadministrador=="cambiarprecio.php")
	{
		header("Location: ../index.php");  
	}
	if ($menuadministrador=="borrarvehiculo.php" or $menuadministrador=="borrar.php")
	{
		header("Location: ../index.php");  
	}
	if ($menuadministrador=="registro.php" or $menuadministrador=="crea_usuarios.php")
	{
		header("Location: ../index.php");  
	}
}
?>
