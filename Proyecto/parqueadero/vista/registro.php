<?php 
session_start();
include "../controlador/control registro.php";

if (empty($_SESSION["validar"]))
{
	$_SESSION["validar"]="";
}
?>
<html lang="en">
<meta charset='utf-8'>
<head>
<em><strong>
<title>Norato´s parking</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="parqueadero/vista/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
<script src="parqueadero/vista/bootstrap/js/bootstrap.min.js"></script>
</head>
<body background="imagenes/tecnol.jpg">
<div class="container">
<header>
<?php include_once 'header.php'; ?>
<div class="col-sm-12 col-md-12">
<div class="panel panel-default">
<div class="panel-heading">
<h3 class="panel-title" align="center">BIENVENIDO A NORATOS PARKING</h3> </div>
<div class="panel-body"> 
<form name="user_form" action="../modelo/crea_usuarios.php" method="POST">
<div class="alert alert-success"> 
<div class="row"> 
<div class="col-sm-12 col-md-12"> 
<table class="" style="" align="center" width="400"> 
<tr><td align="center" style="font-family:Tahoma, Geneva, sans-serif; color:#000">Cédula</td><td> 
<input class="form-control input-sm" type="text" name="Cedula" class="form-control" placeholder="Nombre" required></td></tr> 
<tr><td style="padding:2px"></td></tr>
<tr><td align="center" style="font-family:Tahoma, Geneva, sans-serif; color:#000">Nombre</td><td> 
<input class="form-control input-sm" type="text" name="nom" class="form-control" placeholder="Nombre" required></td></tr> 
<tr><td style="padding:2px"></td></tr>
<tr><td align="center" style="font-family:Tahoma, Geneva, sans-serif; color:#000">Apellido</td><td> 
<input class="form-control input-sm" type="text" name="ape" class="form-control" placeholder="Apellido" required></td></tr> 
<tr><td style="padding:2px"></td></tr>  	
<tr><td align="center" style="font-family:Tahoma, Geneva, sans-serif; color:#000">Contraseña</td><td> 
<input class="form-control input-sm" type="password" name="pass1" class="form-control" placeholder="Contraseña" required></td></tr> 
<tr><td style="padding:4px"></td></tr> 
<tr><td align="center" style="font-family:Tahoma, Geneva, sans-serif; color:#000">Repita Contraseña</td><td> 
<input class="form-control input-sm" type="password" name="pass2" class="form-control" placeholder="Contraseña" required></td></tr> 

<?php 
if ($_SESSION["validar"]!="true")
{
	echo "<tr><td style=\"padding:4px\"></td></tr>";
	echo "<td align=\"center\" style=\"font-family:Tahoma, Geneva, sans-serif; color:#000\">";
	echo "Nivel de Usuario";
	echo "</td>";
	echo "<td>";
	echo "<select name=\"nivel\">";
	echo "<option value=\"1\">Administrador</option>";
	echo "<option value=\"2\">Usuario</option>";
	echo "</select>";
	echo "</td>";
	echo "<tr><td colspan=\"2\"><hr></td></tr> ";
}
?> 
<tr><td style="padding:4px"></td></tr>
<br>
<tr><td align="center" colspan="2" style="color:#000"><input type="submit" name="crear" style="width:400px" value="Crear Usuario"  class="btn btn-info"></td></tr> 
<tr><td style="padding:4px"></td></tr> 
</table>
</form>
<tr><td style="padding:4px"></td></tr>
<p name="errorregistro" align="center"><?php if(isset($_REQUEST['errorregistro'])) { echo $_REQUEST['errorregistro'];}?></p>
<p name="errorcontrasena" align="center"><?php if(isset($_REQUEST['errorcontrasena'])) { echo $_REQUEST['errorcontrasena'];}?></p>
<p name="errorduplicado" align="center"><?php if(isset($_REQUEST['errorduplicado'])) { echo $_REQUEST['errorduplicado'];}?></p>
<p name="registro" align="center"><?php if(isset($_REQUEST['registro'])){echo $_REQUEST['registro'];}?></p>
</div>
</div>
</div>
</div>
</div>
</strong></em>
</header>
</div>
</body>
</html>
 

 






 