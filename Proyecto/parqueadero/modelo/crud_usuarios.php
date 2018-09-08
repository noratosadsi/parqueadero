<?php
session_start();
include '../controlador/control registro.php';
include dirname(dirname(__FILE__))."/modelo/config.php";
$link=Conectarse();

//comprueba si el formulario enviado es para crear usuarios

if ($_POST["crear"])
{

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
		echo "<SCRIPT LANGUAGE=\"javascript\">";
		echo "alert(\"$errorduplicado\"); ";	
		echo "</SCRIPT>";
	} else {
		mysqli_free_result($result);

		if($contrasena1!=$contrasena2) {
			$errorcontrasena="Los passwords deben coincidir";
			echo "<SCRIPT LANGUAGE=\"javascript\">";
			echo "alert(\"$errorcontrasena\"); ";	
			echo "</SCRIPT>";
		} else {

			$contrasena1=sha1(md5($contrasena1));

			$query = sprintf("INSERT INTO usuario (cedula, nombre, apellido, contrasena, rol_idrol)

				VALUES ('%s', '%s', '%s', '%s', '%s')",$cedula, $nombre, $apellido, $contrasena1, $nivel);

			$result=mysqli_query($link,$query);

			if (mysqli_error($link))
			{
				$error=mysqli_error($link);
				echo $error;
				echo "<SCRIPT LANGUAGE=\"javascript\">";
				echo "alert(\"eror al ingresar usuario $error\"); ";
				echo "</SCRIPT>";	
			}

			if(mysqli_affected_rows($link)){
				if ($nivel==1)
				{
					$registro="Administrador registrado exitosamente";
				}
				else
				{
					$registro="usuario registrado exitosamente";
				}
				echo "<SCRIPT LANGUAGE=\"javascript\">";
				echo "alert(\"$registro\"); ";
				echo "</SCRIPT>";	
			} else {
				$errorregistro="Ocurrio un Error al Introducir los Datos";
				echo "<SCRIPT LANGUAGE=\"javascript\">";
				echo "alert(\"$errorregistro\"); ";	
				echo "</SCRIPT>";
			}
		}
	}
}

//comprueba si el formulario enviado es para editar usuarios
if ($_POST["actualizar"])
{
	if($_POST["pass1"]!=$_POST["pass2"])
	{
		$errorcontrasena="Los passwords deben coincidir";
		echo "<SCRIPT LANGUAGE=\"javascript\">";
		echo "alert(\"$errorcontrasena\"); ";	
		echo "</SCRIPT>";
	}
	else 
	{
		$_POST["pass1"]=sha1(md5($_POST["pass1"]));

		$mysql->query("update usuario set nombre='$_POST[nombre]', apellido='$_POST[apellido]', contrasena='$_POST[pass1]', rol_idrol=$_POST[nivel] where cedula=$_POST[id]");
		if ($mysql->error)
		{
			$erroractualizar=$mysql->error;
			echo "<SCRIPT LANGUAGE=\"javascript\">";
			echo "alert(\"$erroractualizar\"); ";	
			echo "</SCRIPT>";
		}
		else
		{
			$actualizado="los datos fueron actualizados";
			echo "<SCRIPT LANGUAGE=\"javascript\">";
			echo "alert(\"$actualizado\"); ";	
			echo "</SCRIPT>";
		}
	}
}

//comprueba si el formulario enviado es para eliminar usuarios
if (isset($_REQUEST["eliminar"]))
{

	$mysql->query("delete from usuario where cedula=$_REQUEST[eliminar];");
	if ($mysql->error)
	{

		$erroreliminar=$mysql->error;
		echo "<SCRIPT LANGUAGE=\"javascript\">";
		echo "alert(\"$erroreliminar\"); ";	
		echo "</SCRIPT>";
	}
	else
	{
		/*$eliminado="los datos fueron eliminados";
		echo "<SCRIPT LANGUAGE=\"javascript\">";
		echo "alert(\"$eliminado\"); ";	
		echo "</SCRIPT>";*/
	}
}

?>
<html>
<META HTTP-EQUIV="Refresh" CONTENT="0; URL=../vista/usuarios.php">
</html>
