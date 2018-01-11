$(function(){
  Materialize.updateTextFields();
});
$("#formregperiodo").validate({
        rules: {
            nombre_periodo: {
                required: true
            },
	    fechauno: {
                required: true,
		dateISO: true
            },
	    fechados: {
                required: true,
		dateISO: true
            }
        },
        messages: {
            nombre_periodo: {
                required: "Ingrese un nombre valido"
            },
	    fechauno: {
                required: "Ingrese una fecha valida",
		dateISO: 'Ingrese una fecha valida'
            },
	    fechados: {
                required: "Ingrese una fecha valida",
		dateISO: 'Ingrese una fecha valida'
            }
        },
        errorElement : 'div',
        errorPlacement: function(error, element) {
          var placement = $(element).data('error');
          if (placement) {
            $(placement).append(error)
          } else {
            error.insertAfter(element);
          }
        },
        submitHandler: function(form) {
	    $('#msgData').empty();
            $('#msgData').html("<div id='modal1accd' class='modal modal-fix-footer'><div class='modal-content'><h4>Mensaje del Sistema</h4><p>Desea registrar un nuevo periodo de residencias profesionales, una vez hecha esta operacion, el periodo actual se dara por finalizado</p></div><div class='modal-footer'><a href='#' onclick='executeRegs();' class='modal-action modal-close waves-effect waves-blue btn-flat'>Aceptar</a><a href='#' class='modal-action modal-close waves-effect waves-red btn-flat'>Cancelar</a></div></div>");
	    $('#modal1accd').modal();
	    $('#modal1accd').modal('open');
        }
     });
 function executeRegs(){
	    var d = new Date($('#fechauno').val());
	    var nuno = d.toISOString().substring(0,10);
	    var d = new Date($('#fechados').val());
	    var ndos = d.toISOString().substring(0,10);
	    $.post(
                    '../../controlador/administrador/datacontroll.php',
		    {
		      accion:'registrarnuevoperiodoglobal',
		      nombre_periodo:$('#nombre_periodo').val(),
		      fechauno:nuno,
		      fechados:ndos
		    },
                    function(data){
                        $("#msgtos").html(data);
			$('#modaldatalibgenreg').modal('close');
			dataClassDocente.getgeneraciondata();
			$('#msgData').html("<div id='modal1accd' class='modal modal-fix-footer'><div class='modal-content'><h4>Mensaje del Sistema</h4><p>Se ha registrado un nuevo periodo de residencias profesionales</p></div><div class='modal-footer'><a href='#' class='modal-action modal-close waves-effect waves-red btn-flat'>Aceptar</a></div></div>");
			$('#modal1accd').modal();
			$('#modal1accd').modal('open');
                    }
            );
}