<?php

$mysql=new mysqli("localhost","root","","parqueadero");   
    if ($mysql->connect_error)
      die('Problemas con la conexion a la base de datos');

function Conectarse(){

/*Si estas hacienda este

tutorial desde tu PC con WampServer deja estos datos como estan */

if (!($link=mysqli_connect("localhost","root",""))) {
echo "Error conectando a la base de datos.";
exit();
}

/*en nombre_BD va el nombre de la BD que creaste al principio*/

if (!mysqli_select_db($link,"parqueadero")){
echo "Error seleccionando la base de datos.";
exit();
}
return $link;
}
$link = Conectarse();

mysqli_close($link); //cierra la conexion

?>