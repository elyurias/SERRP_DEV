function getconfigMenu(){
	$.post(
		'../../controlador/docente/docentecontroll.php',
		{accion:'menudocente'},
		function(data){
			$('.midata').html(data);
		}
	);
}
function nowdata(id){
	alert('plasmar en sistema bla bla..');
	$.post(
		'../../controlador/docente/docentecontroll.php',
		{accion:'menudocente'},
		function(data){
			$('.midata').html(data);
		}
	);
}
function getasesorados(id_asesor_data){
	$.post(
		'../../controlador/docente/docentecontroll.php',
		{
		  accion:'getdocentesasesor',
		  id_asesor:id_asesor_data
		},
		function(data){
		  rellenarTablaS(data)
		}
	);
}
function rellenarTablaS(data){
  $('#contenidoIntro').html('<div></div>');
  $('#tableS').html(data);
}