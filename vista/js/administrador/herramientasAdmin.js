var datav;//getgeneracion(1,1);
function getformModUser(id_datab,tipo){
    var docTD = {accion:'noOperacion'}; 
  	if(tipo == 1){
     	docTD = {accion:'updadmin',id:id_datab};
  	}else if(tipo == 2){
    	docTD = {accion:'upddocente',id:id_datab};
  	}else if(tipo == 3){
   	 	docTD = {accion:'updalumno',id:id_datab};
  	}
  	$.post(
    	'../../controlador/administrador/datacontroll.php',
    	docTD,
    	function(data){
    		  $('#fores').html(data);
    		}
  	);
}
function getgeneracion(inicio,tipo){
     datav = tipo;
     $.post(
            '../../controlador/administrador/datacontroll.php',
            {accion:'getgen'},
            function(data){
            if(tipo != 3){
                if(inicio == 1){
                	$('#fores').html(data);    
            	}
            }
        }
    ).done(function() {
    	getTablaDataJS(tipo,1);
  	});
}
function getTablaDataJS(tipo,part){
  var cadenaLol = "<div class='indeterminate'></div>";
  $('.progress').html(cadenaLol);
  var docTD = {accion:'noOperacion'}; 
  if(tipo == 1){
     docTD = {accion:'tablaasesor',parte:part,gen:$('#idgen').val()};
  }else if(tipo == 2){
    docTD = {accion:'tablaalumno',parte:part,gen:$('#idgen').val()};
  }else if(tipo == 3){
    docTD = {accion:'tablaadmin',parte:part,gen:$('#idgen').val()};
  }
  $.post(
    '../../controlador/administrador/datacontroll.php',
    docTD,
    function(data){
      $('.progress').html('<div class="complete"></div>');
      $('#tableS').html(data);
    }
  );
}
function getFormularioRegistro(tipo){
    var docTD;
    switch(tipo){
        case 1:
            docTD = {accion: 'formadmin'}
            break;
        case 2:
            docTD = {accion: 'formdocente'}
            break;
        case 3:
            docTD = {accion: 'formalumno'}
            break;
    }
    $.post(
        '../../controlador/administrador/datacontroll.php',
        docTD,
        function(data){
            $('#forms_d').html(data);
        }
    );
}
function getFormularioActualiza(tipo,idP){
    var docTD;
    switch(tipo){
        case 1:
        	docTD = {accion: 'updadmin',id:idP}
            break;
        case 2:
            docTD = {accion: 'upddocente',id:idP}
            break;
        case 3:
            docTD = {accion: 'updalumno',id:idP}
            break;
    }
    $.post(
        '../../controlador/administrador/datacontroll.php',
        docTD,
        function(data){
            $('#forms_d').html(data);
        }
    );
}
function qrData(id){
	var link = document.location.href;
	var reference = link.substring(0,link.indexOf('index.html'))+'index.html?accion=login&DNI='+id;
    $('#msgData').html("<div id='modal1' class='modal modal-fixed-footer'><div class='modal-content'><h5><center>Mensaje del Sistema: Generacion de código QR</center></h5><p><center><div id='qr'></div><h6>El siguiente código QR permite el acceso al sistema de entrega y revisión de residencias profesionales al usuario con el ID: "+id+" </h6></center></p></div><div class='modal-footer'><a href='#' class='modal-action modal-close waves-effect waves-green btn-flat'>OK</a></div></div>");
	$('#modal1').modal();
	$('#qr').qrcode({
    // render method: 'canvas', 'image' or 'div'
    render: 'canvas',
    // version range somewhere in 1 .. 40
    minVersion: 1,
    maxVersion: 40,
    // error correction level: 'L', 'M', 'Q' or 'H'
    ecLevel: 'H',
    // offset in pixel if drawn onto existing canvas
    left: 0,
    top: 0,
    // size in pixel
    size: 260,
    // code color or image element
    fill: '#38903d',
    // background color or image element, null for transparent background
    background: null,
    // content
    text: reference,
    // corner radius relative to module width: 0.0 .. 0.5
    radius: 0.2,
    // quiet zone in modules
    quiet: 0,
    // modes
    // 0: normal
    // 1: label strip
    // 2: label box
    // 3: image strip
    // 4: image box
    mode: 2,
    mSize: 0.1,
    mPosX: 0.5,
    mPosY: 0.5,
    label: 'tescha.com',
    fontname: 'sans',
    fontcolor: '#755a05de',
    image: null
    });
	$('#modal1').modal('open');
}