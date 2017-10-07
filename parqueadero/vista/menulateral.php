<!DOCTYPE html> 
<html lang="en"> 
<head> 
<title>Mi Proyecto</title> 
<meta charset="utf-8"> 
<meta name="viewport" content="width=device-width, initial-scale=1"> 
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen"> 
<script src="bootstrap/js/bootstrap.min.js"></script> </head> <body> 
<?php 
$archivo = basename($_SERVER['PHP_SELF']); /* captura el nombre del archive abierto */ 
$c0=""; $c1=""; $c2=""; $c3=""; $c4=""; $c5=""; $c6="";
if ($archivo=="index.php") /* pregunta el nombre del archive y asigna valor “active” si coinciden criterios */ 
{ $c0="active"; } 
if ($archivo=="formularios1.php" or $archivo=="formularios2.php" or $archivo=="formularios3.php" or $archivo=="formularios4.php") 
{ $c1="active"; } 
if ($archivo=="estrucontrol1.php" or $archivo=="estrucontrol2.php" or $archivo=="estrucontrol3.php") 
{ $c2="active"; } 
if ($archivo=="vector1.php" or $archivo=="matriz1.php") 
{ $c3="active"; } 
if ($archivo=="funciones1.php" or $archivo=="funciones2.php") 
{ $c4="active"; } 
if ($archivo=="phppoo1.php" or $archivo=="phppoo2.php") 
{ $c5="active"; } 
if ($archivo=="seguridaddb.php") 
{ $c6="active"; } 

if($archivo=="index.php")
{
$ruta="vista/";
}
else
{
$ruta="";	
}

?> 
<div class="col-md-2 column margintop20"> 
<ul class="nav nav-pills nav-stacked"> <!--/* Se remplaza la palabra “active” de la clase por la variable php */ -->
<li class="<?php echo $c0;?>"><a href="<?php echo $ruta?>../index.php"><span class="glyphicon glyphicon-camera"></span> Home</a></li> 
<li class="<?php echo $c1;?>"><a href="<?php echo $ruta?>formularios1.php">Formularios<span class="glyphicon glyphicon-new-window pull-right"></span> </a></li> 
<li class="<?php echo $c2;?>"><a href="<?php echo $ruta?>estrucontrol1.php">Estruc. Control<span class="glyphicon glyphicon-hand-left pull-right"></span> </a></li> 
<li class="<?php echo $c3;?>"><a href="<?php echo $ruta?>vector1.php">Vectores<span class="glyphicon glyphicon-cog pull-right"></span> </a></li> 
<li class="<?php echo $c4;?>"><a href="<?php echo $ruta?>funciones1.php">Funciones<span class="glyphicon glyphicon-briefcase pull-right"></span> </a></li> 
<li class="<?php echo $c5;?>"><a href="<?php echo $ruta?>phppoo1.php">PHP-POO<span class="glyphicon glyphicon-chevron-right pull-right"></span> </a></li> 
<li class="<?php echo $c6;?>"><a href="<?php echo $ruta?>seguridaddb.php">Seguridad y DB<span class="glyphicon glyphicon-chevron-right pull-right"></span> </a></li> 
</ul> 
</div> 
</body> 
</html>