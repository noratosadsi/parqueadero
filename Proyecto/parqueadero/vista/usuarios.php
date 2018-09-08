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
<title>NORATOS PARKING</title>
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

<div class="alert alert-success"> 
<div class="row"> 
<div class="col-sm-12 col-md-12"> 
	
<a class="btn btn-success" data-toggle="modal" data-target="#nuevoUsu">Nuevo Usuario</a><br><br>
<table class='table'>
<tr>
<th>Cédula</th><th>Nombre</th><th>Apellido</th><th>Rol</th><th><span class="glyphicon glyphicon-wrench"></span></th>
</tr>			
<?php
include "../modelo/config.php";

$consulta= "select * from usuario inner join rol on usuario.rol_idrol=rol.idrol";

if ($resultado = $mysql->query($consulta)) 
{
	while ($fila = $resultado->fetch_row()) 
	{					
		echo "<tr>";
		echo "<td>$fila[0]</td><td>$fila[1]</td><td>$fila[2]</td><td>$fila[6]</td>";
		echo"<td>";						
		echo "<a data-toggle='modal' data-target='#editUsu' data-id='" .$fila[0] ."' data-nombre='" .$fila[1] ."' data-apellido='" .$fila[2] ."' data-rol='" .$fila[6] ."' class='btn btn-warning'><span class='glyphicon glyphicon-pencil'></span>Editar</a> ";			
		echo "<a class='btn btn-danger' href='../modelo/crud_usuarios.php?eliminar=" .$fila[0] ."'><span class='glyphicon glyphicon-remove'></span>Eliminar</a>";		
		echo "</td>";
		echo "</tr>";
	}
	$resultado->close();
}
$mysql->close();			
							
?>
</table>
</div>
</div>

<!------------------crear nuevo usuario---------------------------->

<div class="modal" id="nuevoUsu" tabindex="-1" role="dialog" aria-labellebdy="myModalLabel" aria-hidden="false">

<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h4>Nuevo Usuario</h4>                       
</div>
<div class="modal-body">

<form name="user_form" action="../modelo/crud_usuarios.php" method="POST">
<table class="" style="" align="center" width="400"> 
<tr><td align="center" style="font-family:Tahoma, Geneva, sans-serif; color:#000">Cédula</td><td> 
<input class="form-control input-sm" type="number" name="Cedula" class="form-control" placeholder="cédula" required></td></tr> 
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
if ($_SESSION["validar"]=="true")
{
	echo "<tr><td style=\"padding:4px\"></td></tr>";
	echo "<td align=\"center\" style=\"font-family:Tahoma, Geneva, sans-serif; color:#000\">";
	echo "Nivel de Usuario";
	echo "</td>";
	echo "<td>";
	echo "<select name=\"nivel\" required>";
	echo "<option value=\"\"></option>";
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
<div class="modal-footer">
<button type="button" class="btn btn-warning" data-dismiss="modal">Cerrar</button>
</div>
</div>
</div>
</div>

<!---------------------------------------------Editar usuario---------------------------------------------------->
		<div class="modal" id="editUsu" tabindex="-1" role="dialog" aria-labellebdy="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4>Actualizar Usuario</h4>
					</div>
					<div class="modal-body">

<form name="user_form" action="../modelo/crud_usuarios.php" method="POST">
<table class="" style="" align="center" width="400"> 
<tr><td align="center" style="font-family:Tahoma, Geneva, sans-serif; color:#000">Cédula</td><td> 
<input class="form-control input-sm" type="text" name="id" id="id" class="form-control" placeholder="Nombre" readonly></td></tr> 
<tr><td style="padding:2px"></td></tr>
<tr><td align="center" style="font-family:Tahoma, Geneva, sans-serif; color:#000">Nombre</td><td> 
<input class="form-control input-sm" type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre" required></td></tr> 
<tr><td style="padding:2px"></td></tr>
<tr><td align="center" style="font-family:Tahoma, Geneva, sans-serif; color:#000">Apellido</td><td> 
<input class="form-control input-sm" type="text" name="apellido" id="apellido" class="form-control" placeholder="Apellido" required></td></tr> 
<tr><td style="padding:2px"></td></tr>  	
<tr><td align="center" style="font-family:Tahoma, Geneva, sans-serif; color:#000">Contraseña</td><td> 
<input class="form-control input-sm" type="password" name="pass1" class="form-control" placeholder="Contraseña" required></td></tr> 
<tr><td style="padding:4px"></td></tr> 
<tr><td align="center" style="font-family:Tahoma, Geneva, sans-serif; color:#000">Repita Contraseña</td><td> 
<input class="form-control input-sm" type="password" name="pass2" class="form-control" placeholder="Contraseña" required></td></tr> 

<?php 
if ($_SESSION["validar"]=="true")
{
	echo "<tr><td style=\"padding:4px\"></td></tr>";
	echo "<td align=\"center\" style=\"font-family:Tahoma, Geneva, sans-serif; color:#000\">";
	echo "Nivel de Usuario";
	echo "</td>";
	echo "<td>";
	echo "<select name=\"nivel\" required>";
	echo "<option value=\"\"></option>";
	echo "<option value=\"1\">Administrador</option>";
	echo "<option value=\"2\">Usuario</option>";
	echo "</select>";
	echo "</td>";
	echo "<tr><td colspan=\"2\"><hr></td></tr> ";
}
?> 
<tr><td style="padding:4px"></td></tr>
<br>
<tr><td align="center" colspan="2" style="color:#000"><input type="submit" name="actualizar" style="width:400px" value="Actualizar Usuarioo"  class="btn btn-info"></td></tr> 
<tr><td style="padding:4px"></td></tr> 
</table>
</form>			</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-warning" data-dismiss="modal">Cerrar</button>
					</div>
				</div>
			</div>
		</div> 	
	</div>

</div>
</div>
</div>
</strong></em>
</header>
</div>

<script src="bootstrap/js/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>		
<script>			 
$('#editUsu').on('show.bs.modal', function (event) {
			var button = $(event.relatedTarget) // Button that triggered the modal
			var recipient0 = button.data('id')
			var recipient1 = button.data('nombre')
			var recipient2 = button.data('apellido')
			var recipient3 = button.data('rol')
			// Extract info from data-* attributes
			// If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
			// Update the modal's content. We'll use jQuery here, but you ould use a data binding library or other methods instead.
					
			var modal = $(this)		 
			modal.find('.modal-body #id').val(recipient0)
			modal.find('.modal-body #nombre').val(recipient1)
			modal.find('.modal-body #apellido').val(recipient2)
			modal.find('.modal-body #rol').val(recipient3)		 
			});
		
			</script>
</body>
</html>
 

 






 