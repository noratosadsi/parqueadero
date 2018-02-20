<?php
session_start();
include '../controlador/control registro.php';
include dirname(dirname(__FILE__))."/modelo/config.php";
$link=Conectarse();

$roles=$mysql->query("select count(*) as rol from rol")
or die($mysql->error);
$rol=$roles->fetch_array();

$usuarios=$mysql->query("select * from rol")
or die($mysql->error);
$usu=$usuarios->fetch_array();

function administrador ($mysql)
{
	$mysql->query("insert into rol (idrol, descripcion) values (1, 'administrador')")
    or die($mysql->error);
}
function usuario ($mysql)
{
	$mysql->query("insert into rol (idrol, descripcion) values (2, 'usuario')")
    or die($mysql->error);
}
if ($rol["rol"]==0)
{
	administrador($mysql);
	usuario($mysql);
}
elseif ($rol["rol"]==1)
{
	if ($usu["idrol"]==1)
	{
		usuario($mysql);
	}
	else
	{
		administrador($mysql);
	}
}

$cedula = $_POST['Cedula'];
$nombre = $_POST['nom'];
$apellido = $_POST['ape'];
$contrasena1= $_POST['pass1'];
$contrasena2=$_POST['pass2'];
$nivel = $_POST['nivel'];

if ($nivel==0)
{
	$nivel = 2;
}

$query = sprintf("SELECT cedula FROM usuario WHERE usuario.cedula='%s'" ,
$cedula);

$result=mysqli_query($link,$query);

if(mysqli_num_rows($result)){
	$errorduplicado="La cedula ya existe en la Base de Datos";
	header("Location: ../vista/registro.php?errorduplicado=$errorduplicado");
} else {
	mysqli_free_result($result);

	if($contrasena1!=$contrasena2) {
		$errorcontrasena="Los passwords deben coincidir";
		header("Location: ../vista/registro.php?errorcontrasena=$errorcontrasena");
	} else {

		$contrasena1=sha1(md5($contrasena1));

		$query = sprintf("INSERT INTO usuario (cedula, nombre, apellido, contrasena, rol_idrol)

VALUES ('%s', '%s', '%s', '%s', '%s')",$cedula, $nombre, $apellido, $contrasena1, $nivel);

		$result=mysqli_query($link,$query);

		if(mysqli_affected_rows($link)){
			if ($nivel==1)
			{
				$registro="Administrador registrado exitosamente";
			}
			else
			{
				$registro="usuario registrado exitosamente";
			}		
			header("Location: ../vista/registro.php?registro=$registro");
		} else {
			$errorregistro="Ocurrio un Error al Introducir los Datos";
			header("Location: ../vista/registro.php?errorregistro=$errorregistro");
		}
	}
}

?>