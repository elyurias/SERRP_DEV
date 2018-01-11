$(document).ready(function() {
	Materialize.updateTextFields();
	$('#modal1ModLimit').modal();
	$('#modal1ModLimit').modal('open');
});
 $("#formMaxLimit").validate({
        rules: {
            maxlimit: {
                required: true,
            }
        },
        messages: {
            maxlimit: {
                required: "Ingrese un identificador valido",
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
            $.post(
                    '../../controlador/administrador/datacontroll.php',
                    $('#formMaxLimit').serialize(),
                    function(data){
			$("#msgtos").empty();
                        $("#msgtos").html(data);
			$('#modal1ModLimit').modal('close');
			getTablaDataJS(1,1);
                    }
            );
        }
     });