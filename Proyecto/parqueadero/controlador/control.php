<?php
$menuadministrador=basename($_SERVER['PHP_SELF']);

if (!isset($_SESSION))
{
	session_start(); 
}
if ($_SESSION["validar"]!="true") { 

header("Location: vista/seguridad.php");

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
