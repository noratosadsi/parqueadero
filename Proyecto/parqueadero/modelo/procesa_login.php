<?php
session_start();
include dirname(dirname(__FILE__))."/modelo/config.php";
$link=Conectarse();

$login = $_POST['login'];
$pass = $_POST['password'];
$pass=sha1(md5($pass));

$query = sprintf("SELECT *
	FROM usuario WHERE usuario.cedula='%s'&& usuario.contrasena = '%s'",
	$login, $pass);
	
$result=mysqli_query($link,$query);

if(mysqli_num_rows($result)){
	$array=mysqli_fetch_array($result);
	$_SESSION["validar"]="true";
	    $_SESSION["id_usuario"]= $array["cedula"];
	    $_SESSION["login"]= $array["nombre"];
	    $_SESSION["nombre"]= $array["apellido"];
	    $_SESSION["nivel"]= $array["rol_idrol"];
	    header("location:../index.php");
}
else
{
	$query = sprintf("SELECT *
	FROM usuario WHERE usuario.cedula='%s'",$login);
	$result=mysqli_query($link,$query);
   
	if(mysqli_num_rows($result))
	{
		$respuesta="contraseña incorrecta";
	    header("location:../vista/seguridad.php?error=$respuesta");
	}
	else
	{
		$respuesta="Éste usuario no existe";
	header("location:../vista/seguridad.php?error=$respuesta");
	}
	
}
?>