<?php
session_start();

$mysql=new mysqli("localhost","root","","parqueadero");   
    if ($mysql->connect_error)
      die('Problemas con la conexion a la base de datos');
    
$login=$mysql->query("select * from usuario where nombre='$_REQUEST[login]'") or
      die($mysql->error);
	  
	  
$log=$login->fetch_array();

$_SESSION['usuario']=$log['nombre'];
$_SESSION['apellido']=$log['apellido'];
$_SESSION['clave']=$log['contrasena'];


if ($_REQUEST['login']==$_SESSION['usuario'] and $_REQUEST['password']==$_SESSION['clave'])
{
	if (isset($_SESSION['usuario']) and isset($_SESSION['clave']))
	{
    header("location:../vista/menuparqueadero.php");
    }
	else
    {
	$respuesta="usuario y contraseña incorrectos";
	header("location:../index.php?respuesta=$respuesta");
    }
}
else
{
	$respuesta="usuario y contraseña incorrectos";
	header("location:../index.php?respuesta=$respuesta");
}
	
$mysql->close();
?>