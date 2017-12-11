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
