<!DOCTYPE html>
<?php ob_start();?>
<html><meta charset="utf-8"><table>
	<tr>
	<th colspan="2">RECIBO DE PAGO</th>
	</tr>
	<tr>
		<td>Parqueadero</td>
		<td>Norato's Parking</td>
	</tr>
	<tr>
		<td>Fecha factura</td>
		<td><?php echo $_REQUEST["fechafactura"]?></td>
	</tr>
	<tr>
		<td>Cédula</td>
		<td><?php echo $_POST["cedula"]?></td>
	</tr>
	<tr>
		<td>Nombre</td>
		<td><?php echo $_POST["nombre"]?></td>
	</tr>
	<tr>
		<td>Apellido</td>
		<td><?php echo $_POST["apellido"]?></td>
	</tr>
	<tr>
		<td>Matrícula</td>
		<td><?php echo $_POST["matricula"]?></td>
	</tr>
	<tr>
		<td>Hora Ingreso</td>
		<td><?php echo $_POST["horaingreso"]?></td>
	</tr>
	<tr>
		<td>Hora Salida</td>
		<td><?php echo $_POST["horasalida"]?></td>
	</tr>
	<tr>
		<td>Duración</td>
		<td><?php echo $_POST["duracion"]?></td>
	</tr>
	<tr>
		<td>Total</td>
		<td>$<?php echo $_POST["total"]?></td>
	</tr>
</table></html>
<?php
require_once("dompdf/dompdf_config.inc.php");
$dompdf=new DOMPDF();
$dompdf->set_paper(array(0,0,250,280));
$dompdf->load_html(ob_get_clean());
$dompdf->render();
$pdf=$dompdf->output();
$filename="recibo.pdf";
$dompdf->stream($filename, array("Attachment"=>0));

?>	