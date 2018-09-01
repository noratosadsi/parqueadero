<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>
<?php
include "config.php";


if($_POST['motos']){
	$mysql->query("update cupos set cantidad='$_REQUEST[motos]' where vehiculo='moto'");
	  if ($mysql->error)
	  {
		  $errorm="errmoto";
	  }
}if ($_POST['bicicletas']){
	$mysql->query("update cupos set cantidad='$_REQUEST[bicicletas]' where vehiculo='bicicleta'");
	  if ($mysql->error)
	  {
		  $errorb="errbici";
		  //header("location: ../vista/cupos2.php?error");
	  }	  
}

if(isset($errorm) or isset($errorb))
{
	header("location: ../vista/cupos2.php?error=$errorm&error2=$errorb");
}
else 
{
	header("location: ../vista/menu administrador.php");
}
?>
<body>
</body>
</html>