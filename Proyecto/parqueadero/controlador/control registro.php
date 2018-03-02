<?php
if (empty($_SESSION['nivel'])) 
{
	$_SESSION["nivel"]="";
} 
	
if ($_SESSION["nivel"]==2)
{
	header("Location:../index.php");  
}	
?>
