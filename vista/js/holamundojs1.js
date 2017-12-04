function holamundo(){
	var datos="action=mensajeuno";
	//var docJson = {accion:"mensajeuno"};
	$.post("../controlador/holacontrol.php",
		datos,
		function(data){
			alert(data);
			//$("#principal").html(data);
		}
	);
	//alert('Terminados');
}
function holamundodos(){
	var datos="action=mensajedos";
	//var docJson = {accion:"mensajeuno"};
	$.post("../controlador/holacontrol.php",
		datos,
		function(data){
			alert(data);
			//$("#principal").html(data);
		}
	);
}
function registrarformulario(){
	alert('Preparando datos para insertar');
	var datos = "action=registraformulario&"+$("#formularioregistro").serialize();
	$.post("../controlador/holacontrol.php",
		datos,
		function(data){
			$("#principal").prepend(data); //poner los registros en un arreglo 0.1.2.3...n
		}
	);
}
