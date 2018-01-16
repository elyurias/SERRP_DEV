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
function ver_avances_alumno(id_alumno_data){
  $.post(
		'../../controlador/docente/docentecontroll.php',
		{
		  accion:'getdocentesasesordoc',
		  id_alumno:id_alumno_data
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
function getsoldata(idVidenti){
  $.post(
		'../../controlador/docente/docentecontroll.php',
		{
		  accion:'getsolicitudesasesor',
		  id_asesor:idVidenti
		},
		function(data){
		  rellenarTablaS(data)
		}
  );
}