<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>
<?php
include "config.php";


if($_POST['motos']){
	$mysql->query("update cupos set motos='$_REQUEST[motos]'")
      or die($mysql->error);
	  header("location: ../vista/menu administrador.php");
}if ($_POST['bicicletas']){
	$mysql->query("update cupos set bicicletas='$_REQUEST[bicicletas]'")
      or die($mysql->error);
	  header("location: ../vista/menu administrador.php");
}else{
	echo "No se pudo actualizar los datos";
	header("location: ../vista/menu administrador.php");
}
?>
<body>
</body>
</html>