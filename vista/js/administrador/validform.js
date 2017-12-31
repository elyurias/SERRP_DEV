 $("#formValidate").validate({
        rules: {
            id: {
                required: true,
            },
            nombre: {
                required: true,
            },
            paterno: {
                required: true,
            },
            materno: {
                required: true,
            },
            telh: {
                required: true,
            },
            maxmi: {
                required: true,
            },
            telc: {
                required: true,
            },
            email: {
                required: true,
                email:true
            },
            idesp:"required",
            sexo:"required",
            estado:"required",
        },
        //For custom messages
        messages: {
            id: {
                required: "Ingrese un identificador valido",
            },
            nombre: {
                required: "Ingrese un nombre valido",
            },
            paterno: {
                required: "Ingrese un apellido valido",
            },
            materno: {
                required: "Ingrese un apellido valido",
            },
            telh: {
                required: "Ingrese un telefono valido",
            },
            maxmi: {
                required: "Ingrese un numero valido",
            },
            telc: {
                required: "Ingrese un telefono valido",
            },
            email: {
                required: "Correo requerido",
                email:"Ingrese un correo valido"
            },
            idesp:"Ingrese una especialidad valida",
            sexo:"Sexo requerido",
            estado:"Estado requerido",
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
                    $('#formValidate').serialize(),
                    function(data){
                        $("#msgtos").html(data);
			$('#modal1').modal();
			$('#modal1').modal('open');
			$('#modal3').modal('close');
			getTablaDataJS(datav,1);
                    }
            );
        }
     });