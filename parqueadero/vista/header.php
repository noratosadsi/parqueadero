
<!DOCTYPE html> <html lang="en"> 
<head> 
<title>Mi Proyecto</title> 
<meta charset="utf-8"> 
<meta name="viewport" content="width=device-width, initial-scale=1"> 
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen"> 
<script src="bootstrap/js/bootstrap.min.js"></script> 
</head> 
<body background="imagenes/tecnologia.jpg">

<?php 

if(!isset($_SESSION["usuario"])) // Verifica si la variable de sesión creada esta activa si no la inicializa
{
	session_start();
}

$archivo1 = basename($_SERVER['PHP_SELF']); /* captura el nombre del archive abierto */ 

if($archivo1=="index.php")
{
$ruta1="vista/";
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
<li class="active"><a href="../vista/menuparqueadero.php">Inicio</a></li> 
<li><a href="#">Ficha 1262139 G1-G2</a></li> 
<li><a href="#">Jornada FSD</a></li>
</ul> 

<ul class="nav navbar-nav navbar-right"> 

<li class="pull-right"><a href="<?php if(isset($_SESSION['usuario'])){echo $ruta1.'menuparqueadero.php';} else {
echo $ruta1.'menuparqueadero.php';}?>"><span class="glyphicon glyphicon-user"></span> <?php
if(isset($_SESSION["usuario"])){ echo $_SESSION["usuario"]." ".$_SESSION["apellido"];} else{echo "usuario";}?></a></li>
</ul>
</div>
</nav>
<h3 align="center" style="color:#FFF"><?php echo "SISTEMA DE CONTROL DE PARQUEADERO"; ?></h3>
<p align="center" style="color:#FFF">MOCKUP PROYECTO</p> 
</div>
</body>
</html> 