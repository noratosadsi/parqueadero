<html>
<head>
</head>

<body>
<form name="form1">
<b>Sexo:</b>
<input type="radio" id="r1" onclick="myFunction()" name="tarifa" value="minutos">Minutos
<input type="radio" id="r2" onclick="myFunction()" name="tarifa" value="horas">Horas
<input type="radio" id="r3" onclick="myFunction()" name="tarifa" value="dias">Dias
<input type="radio" id="r4" onclick="myFunction()" name="tarifa" value="mes">Mes
<br><br>

<select onchange="myFunction()" id="vehiculo" name="tipo">
<option value=""></option>
<option value="moto">moto</option>
<option value="bicicleta">bicicleta</option>
</select>
<br><br>
vehiculo
<input type="text" id="veh" name="vehiculo1" >
tarifa
<input type="text" id="tar" name="tarifa1" >
<br>
<input type="text" onchange="costo()" name="costotarif" value="" style="text-align:center" >
<br>
costotarif<input type="text" name="costotarif" value="" style="text-align:center" >


</form> 
</body>
</html>

<script>

function myFunction() {

if((
(document.getElementById("r1").checked == true) 
|  (document.getElementById("r2").checked == true) 
|  (document.getElementById("r3").checked == true) 
| (document.getElementById("r4").checked == true)
) &
(document.form1.tipo.value != "")
 )
{

   

//Valida radio checkeado	
	o = document.forms[0].tarifa;
	for(i=0;i<o.length;i++){
		if(o[i].checked){
			var sel =(o[i].value);
			//alert("Ha seleccionado "+sel);
			//alert("Ha seleccionado "+o[i].value);
document.getElementsByName("tarifa1")[0].value = sel;			
			break;
		}
	}	

//Valida opcion seleccionada	
    var x = document.getElementById("vehiculo").selectedIndex;
    //alert(document.getElementsByTagName("option")[x].value);
	vehiculo = (document.getElementsByTagName("option")[x].value);
	//alert (vehiculo);
	document.getElementsByName("vehiculo1")[0].value = vehiculo;



// Calcula costo	
var veh = document.getElementById('veh').value;
var tar = document.getElementById('tar').value;

if ((veh=='moto')&& (tar=='minutos')) {

var z = "30";
      alert (z);
document.getElementsByName("costotarif")[0].value = z;
	  
	  
} else {

var z = "60";
      alert (z);
document.getElementsByName("costotarif")[0].value = z;

} 
}

 else{
		if 
		((document.getElementById("r1").checked == true) 
		|  (document.getElementById("r2").checked == true) 
		|  (document.getElementById("r3").checked == true) 
		| (document.getElementById("r4").checked == true)
		){
		alert ("Debe seleccionar un tipo de Vehiculo");
		 document.getElementById('vehiculo').focus();
		}
		else{
			alert ("Debe seleccionar una Tarifa");
			document.getElementById('r1').focus();
			}
 }

}

</script>

