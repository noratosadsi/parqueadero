<html lang="en"> 
<head> 
<title>Mi Proyecto</title> 
<meta charset="utf-8"> 
<meta name="viewport" content="width=device-width, initial-scale=1"> 
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen"> 
<script src="bootstrap/js/bootstrap.min.js"></script> 
</head> 
<body background="imagenes/tecnologia.jpg">

<?php 
$archivo1 = basename($_SERVER['PHP_SELF']); 

if($archivo1=="index.php")
{
$ruta1="/parqueadero";
}
else
{
$ruta1="";	
}
?> 

<div class="container"> 
<nav class="navbar navbar-inverse"> 
<div class="container-fluid"> 
<div class="navbar-header"> 
<a class="navbar-brand" href="#">PROYECTO ADSI</a> 
</div> 
<ul class="nav navbar-nav"> 
<li><a href="/parqueadero/index.php">Inicio</a></li> 
<li><a href="#">Ficha 1262139 G1-G2</a></li> 
<li><a href="#">Jornada FSD</a></li>
<li><a href="#">
<?php
if (isset($_SESSION['nivel']))
{
	if ($_SESSION["nivel"]==1)
	{
		echo "Administrador";
	}
	elseif ($_SESSION["nivel"]==2)
	{
		echo "Usuario";
	}
}
?>
</a></li>
</ul> 

<ul class="nav navbar-nav navbar-right"> 

<li class="pull-right"><a href="<?php if(isset($_SESSION['login'])){echo $ruta1.'../controlador/logout.php';} else {
echo $ruta1.'../vista/seguridad.php';}?>"><span class="glyphicon glyphicon-log-out"></span> <?php
if(isset($_SESSION["login"])){ echo "Salir";} else{echo "Iniciar sesion";}?></a></li>

<li class="pull-right"><a href="<?php if(isset($_SESSION['login'])){echo $ruta1.'../index.php';} else {
echo $ruta1.'../vista/seguridad.php';}?>"><span class="glyphicon glyphicon-user"></span> <?php
if(isset($_SESSION["login"])){ echo $_SESSION["login"]." ".$_SESSION["nombre"];} else{echo "sin sesion";}?></a></li>
</ul>
</div>
</nav>
<!--<h3 align="center" style="color:#FFF"><?php echo "SISTEMA DE CONTROL DE PARQUEADERO"; ?></h3>
<p align="center" style="color:#FFF">MOCKUP PROYECTO</p> -->
</div>
</body>
</html> 