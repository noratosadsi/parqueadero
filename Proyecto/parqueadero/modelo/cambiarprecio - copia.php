 <?php
include "../controlador/control.php";
include "config.php";
class cambiarprecio {	
	
	public function precio($mysql){
		
	$result=$mysql->query("select count(*) as precios from costo")
	or die($mysql->error." error seleccionando precio");
	$res=$result->fetch_array();
	
	$nulo=$mysql->query("select * from costo where vehiculo='$_REQUEST[tipo]'")
	or die($mysql->error." error seleccionando vehiculo");
	$nul=$nulo->fetch_array();
	
	function preciomoto($mysql){
		$mysql->query("insert into costo (id, vehiculo, precio) values (1,'moto',$_REQUEST[precio]);");
		if ($mysql->error)
		die(header ("Location: ../vista/precio.php?error=Ingreso no válido"));
	}
	function preciocicla($mysql){
		$mysql->query("insert into costo (id, vehiculo, precio) values (2,'bicicleta',$_REQUEST[precio]);");
		if ($mysql->error)
		die(header ("Location: ../vista/precio.php?error=Ingreso no válido"));
	}
    function actualizarprecio($mysql){
		$mysql->query("update costo set precio=$_REQUEST[precio] where vehiculo='$_REQUEST[tipo]';");
	    if ($mysql->error)
		die(header ("Location: ../vista/precio.php?error=Ingreso no válido"));
	}
	
	if ($res['precios']==0)
	{
		$_REQUEST["precio"]=60;
		preciomoto($mysql);
		preciocicla($mysql);
	}
	elseif ($res['precios']==1)
	{	
		if ($_REQUEST["tipo"]=="bicicleta")
		{	
			if ($nul['vehiculo']=="bicicleta")
		    {
				actualizarprecio($mysql);
			    $_REQUEST["precio"]=60;
			    preciomoto($mysql);
		    }
			else
			{
				preciocicla($mysql);
			}
		}
		if ($_REQUEST["tipo"]=="moto")
		{
			if ($nul['vehiculo']=="moto")
		    {
				actualizarprecio($mysql);
			    $_REQUEST["precio"]=60;
			    preciocicla($mysql);			
	        }
			else
			{
				preciomoto($mysql);
			}		
		}
	}
	else
	{
		actualizarprecio($mysql);	
	}
	}
	public function ajustar()
	{
		$_REQUEST["precio"]=60;
	}
	
	public function tabla($mysql){

    $preciobici=$mysql->query("select * from costo where id=2") or
    die($mysql->error); 
	$bici=$preciobici->fetch_array();
	
	$preciomoto=$mysql->query("select * from costo where id=1") or
    die($mysql->error); 
	$moto=$preciomoto->fetch_array();
	
	$preciobici=$bici["precio"];
	$preciomoto=$moto["precio"];
	
	if ($preciobici=="")
	{
		$preciobici="sin precio";
	}
	else 
	{
		$preciobici="$$preciobici";	
	}
	if ($preciomoto=="")
	{
		$preciomoto="sin precio";
	}
	else 
	{
		$preciomoto="$$preciomoto";	
	}

echo '<table Border=2 align="center" cellspacing="0">';
	  echo '<tr>';
	  echo '<td align="center" colspan="2">';
      echo 'Costo actual por minuto';
	  echo '</td>';
	  echo '</tr>';
	  echo '<tr>';
	  echo '<td align="center">';
      echo 'Moto';
	  echo '</td>';
	  echo '<td align="center">';
      echo 'Bicicleta';
	  echo '</td>';
	  echo '</tr>';
	  echo '<tr>';
      echo '</td>';
      echo '<td align="center">';
      echo $preciomoto;
      echo '</td>';
	  echo '<td align="center">';
      echo $preciobici;
      echo '</td>';
	  echo '</tr>';
	  echo '</table>';
	$mysql->close(); 
	}
}
$cambiarprecio=new cambiarprecio();

if (isset($_POST['precio']))
{
	$cambiarprecio->precio($mysql); 
	$cambiarprecio->tabla($mysql);
}
elseif (basename($_SERVER["PHP_SELF"])=="precio.php")
{
	$cambiarprecio->tabla($mysql);
}





?>