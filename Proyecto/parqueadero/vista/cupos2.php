<?php include "../controlador/control.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Mi Proyecto</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="../vista/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
<script src="../vista/bootstrap/js/bootstrap.min.js"></script>
</head>
<body background="../vista/imagenes/tecnol.jpg"><em><strong>
<div class="container">
<header>
<?php include_once 'header.php'; ?>

<div class="col-sm-12 col-md-12"> 
<div class="panel panel-default"> 
<!-- contenedor del titulo--> 
<div class="panel-heading"> 
<h2 align="center">ESTACIONAMIENTOS DISPONIBLES</h2> 
</div> 
<div class="panel-body"> 


<!-- Contenedor ejercicio--> 
<div class="alert alert-success"> 
<div class="row"> 
<div class="col-sm-12 col-md-12">  

<!--nuevo-->

<?php 
//consulta el numero de cupos 

include "../modelo/config.php";

$cuposm=$mysql->query("select * from cupos where vehiculo='moto'")
      or die($mysql->error);
        $cupm=$cuposm->fetch_array();
        
$cuposb=$mysql->query("select * from cupos where vehiculo='bicicleta'")
or die($mysql->error);
$cupb=$cuposb->fetch_array();

if (isset($_REQUEST["error"]))
{
      if ($_REQUEST["error"]=="errmoto")
      {
            echo "<script>alert('error al actualizar los cupos para motos');</script>";
      }
      if ($_REQUEST["error2"]=="errbici")
      {
            echo "<script>alert('error al actualizar los cupos para bicicletas');</script>";
      }
}
?>

<form action="../modelo/numero de parqueaderos php.php" method="post">
<table border="0" align="center">
<tr>
<td style="color:#0A0909"><u>INGRESAR NUMERO DE ESTACIONAMIENTO PARA MOTOS</u></td>
<td width="10"><br></td>
<td><input type="text" placeholder="colocar su numero" name="motos" value="<?php echo $cupm["cantidad"]?>"></td>
</tr>
<tr>
<td style="color:#0A0909"><u>INGRESAR NUMERO DE ESTACIONAMIENTO PARA BICICLETAS</u></td>
<td> <br></td>
<td><input type="text" placeholder="colocar su numero" name="bicicletas" value="<?php echo $cupb["cantidad"]?>"></td>
</tr>
<tr>
<td style="color:#000" align="center" colspan="3"><input type="submit" value="ACTUALIZAR" class= "btn btn-info" >
</tr>
</table>
</form>
</div> 
</div> 
</div> 
</div> 
</div>
</div>

</header>

</div>
</strong></em></body>
</html>