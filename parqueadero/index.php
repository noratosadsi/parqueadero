<html>
<head> 
<meta charset="utf-8">

<body height="100%" width="100%">
<table align="center" border="10">
<td align="center"><script> document.write('<IMG SRC="vista/imagenes/ADSI.jpg">');</script></td>
<tr>
<td align="center"><h2>Presentación Grupo # 1</h2>
<h1><strong>" Norato´s parking"</h1></td>
</tr>
</table>
<SCRIPT  language="JavaScript"> 
function validar()
{
if (document.form.password.value=='12345' && document.form.login.value=='grupo1')
{ 
alert("Bienvenidos, acceso valido"); 
} 
else
{ 
alert("Por favor ingrese, nombre de usuario y contraseña correctos."); 
} 
} 
</SCRIPT> 
</head>
<table align="center">
<FORM name="form" action="controlador/login.php" method="post">

<tr><td align="center">
<h4>Usuario: &nbsp <INPUT type="text"name="login">
Contraseña: &nbsp <INPUT type="password" name="password">
<INPUT type="submit" value="Acceder" name="enviar"></h4>
</td>
</tr>
<tr>
<td name="respuesta">
<h4><?php if(isset($_REQUEST['respuesta'])) { echo $_REQUEST['respuesta'];}?></h4>
</td>
</tr>
<br>
<link rel="StyleSheet" href="vista/estilos/Estilos.css" type="text/css"></td></tr>
</form>
</table>


<table border="20" align="center" height="100%"width="100%" cellspacing="20">
<script language="javascript">
<td colspan="2"><script> document.write('<IMG SRC="ADSI.jpg">');</script></td>
</script>
<td align="center" colspan="3"><h1>Descripcion de aspectos del proyecto</h1>
<tr><td><h4><td align="center"><script> document.write('<IMG SRC="vista/imagenes/Bpmndespuesdelaimplementacion.jpg">');</script></td>:<br>

<script language="javascript">
<td align="center"><h2>Presentación Grupo # 1</h2>


<script language="javascript">
<td align="center" ><h2>Presentación Grupo # 1</h2>
<td><script> document.write('<IMG SRC="vista/imagenes/Bpmndespuesdelaimplementacion.jpg">');</script></td>
</script>
<td align="center"><h2>BPMN despues de la impementacion</h2>
<tr><td><h4><td align="center"><script> document.write('<IMG SRC="vista/imagenes/Cronograma.jpg">');</script></td><br>


<td align="center"><h2>Cronograma</h2>
<tr><td><h4><td align="center"><script> document.write('<IMG SRC="vista/imagenes/costos.jpg">');</script></td><br>


<script language="javascript">
<td align="center"><script> document.write('<IMG SRC="vista/imagenes/costos.jpg">');</script></td></script>
<td align="center"><h2>Costos</h2>


<tr><td><h4><td align="center"><script> document.write('<IMG SRC="vista/imagenes/Casosdeuso.jpg">');</script></td><br>
<td align="center"><h2>Casos de Uso</h2></tr>

<tr><th><h4><td align="center"><script> document.write('<IMG SRC="vista/imagenes/Gestiondeprocesos.jpg">');</script></td></h4>
<td align="center"><h2>Gestion de procesos</h2>

<tr><th><h4><td align="center"><script> document.write('<IMG SRC="vista/imagenes/Diagramadeclases.png">');</script></td></h4>
<td align="center"><h2>Diagrama de clases</h2>

<tr><th><h4><td align="center"><script> document.write('<IMG SRC="vista/imagenes/e-r parqueadero.png">');</script></td></h4>
<td align="center"><h2>Modelo Relacional del proyecto</h2>

<tr><th><td align="center"> <img src="vista/imagenes/Diccionario.PNG" width="70%" height="70%"></td>
<td align="center"><a href= "vista/imagenes/diccionario de datos" align="center" target="_blank"><h2>Diccionario de Datos</h2>

<tr><td><p><br><td align="center"><script> document.write('<IMG SRC="vista/imagenes/Muckup.jpg">');</script></td><br><br>
<td align="center"><h2>Mockup</h2>

<tr><th><td align="center"><a href= "https://github.com/" align="center" target="_blank"> <br><h2><strong>Acceda aquí para nuestro GITHUB </strong></h2></td>
<td align="center"><br><h2>GITHUB</h2></td></tr>

</body>
</html>
