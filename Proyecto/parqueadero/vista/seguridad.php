<!DOCTYPE html>

<html lang="en">

<meta charset='utf-8'>

<head>

<title>Norato´s parking</title>

<meta charset="utf-8">

<meta name="viewport" content="width=device-width, initial-scale=1">

<link href="vista/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">

<script src="vista/bootstrap/js/bootstrap.min.js"></script>

</head>

<body>

<div class="container">



<header>

<?php include 'header.php'; ?>



<div class="col-sm-12 col-md-12">

<!--Columna de 10 espacios para contenido central e imágenes-->

<div class="panel panel-default">

<div class="panel-heading">

<h3 class="panel-title" align="center">BIENVENIDO A NORATOS PARKING</h3> </div>

<div class="panel-body">

<form name="areat" action="../modelo/procesa_login.php" method="post">

<table class="" style="" align="center">

<tr><td style="color:#800000; font-family:Tahoma, Geneva, sans-serif" align="center">INICIO DE SESION</td></tr>

<tr><td style="padding:5px"></td></tr><tr><td>

<div class="input-group input-group-sm">

<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>

<input type="text" name="login" class="form-control" placeholder="Cédula" required >

</div></td></tr>

<tr><td style="padding:2px"></td></tr>

<tr><td><div class="input-group input-group-sm">

<span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>

<input type="password" name="password" class="form-control" placeholder="Contraseña" required>

</div></td></tr>

<tr><td style="padding:4px"></td></tr>

<tr><td align="center"><input type="submit" name="enviar" class="" width="300px"></td></td>

<tr><td style="padding:4px"></td></tr>

<tr>
<td style="color:#F00" name="error"><?php if(isset($_REQUEST['error'])) { echo $_REQUEST["error"];}?></td>
</tr>

</table>

</form>
</div>

</div>

</div>

</div>

</div>

</header>

</div>

</body>

</html>