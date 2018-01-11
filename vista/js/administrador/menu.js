var stSession;
$(document).ready(function(){
	try{
		ve({accion:getParam()['accion'].replace('#',''),DNI:getParam()['DNI'].replace('#','')});
	}catch(err){
		ve({accion:'login'});
	}
});
function closeSession(){
	ve({accion:'lout'});
}
function res_url(){
	setTimeout(function(){window.location = 'http://tesch.edu.mx/';},1000);
}
function ve(doc){
	$.post(
		"../../controlador/administrador/logincontroll.php",
		doc).done(function(data){
		usr = menu(data);
	});
}
function encabezado(doc){
	$.post(
		"../../controlador/administrador/datacontroll.php",
		doc).done(function(data){
		console.log(data);
		$('.encabezado').html(data);
	});
}
function menu(data){
	switch(data.trim()){
		case 'siSess':
			encabezado({accion:'encabezado'});
			getpiepaginaData();
			getdataintro();
			return 1;
		break;
		case 'siVali':
			$('#msgData').html("<div id='modal1' class='modal modal-fix-footer'><div class='modal-content'><h4>Mensaje del Sistema</h4><p>Bienvenido al Sistema de Entrega y Revision de Residencias Profesionales</p></div><div class='modal-footer'><a href='#' class='modal-action modal-close waves-effect waves-blue btn-flat'>OK</a></div></div>");
			$('#modal1').modal();
			$('#modal1').modal('open');
			var link = document.location.href;
			setTimeout(function(){window.location = link.substring(0,link.indexOf('?'));},1000);
			encabezado({accion:'encabezado'});
			getpiepaginaData();
			getdataintro();
			return 2;
		break;
		case 'soSess':
			encabezado({accion:'encabezado'});
			getpiepaginaData();
			getdataintro();
			return 3;
		break;
		case 'ltend':
			$('#msgData').html("<div id='modal1' class='modal modal-fix-footer'><div class='modal-content'><h4>Mensaje del Sistema</h4><p>Tu sesi&oacute;n ha expirado</p></div></div>");
			$('#modal1').modal();
			$('#modal1').modal('open');
			res_url();
			return 4;
		break;
		case 'logout':
			$('#msgData').html("<div id='modal1' class='modal modal-fix-footer'><div class='modal-content'><h4>Mensaje del Sistema</h4><p>Sesi&oacute;n cerrada</p></div></div>");
			$('#modal1').modal();
			$('#modal1').modal('open');
			res_url();
			return 4;
		break;
		default:
			$('#msgData').html(data);
			$('#modal1').modal();
			$('#modal1').modal('open');
			return 5;
		break;
	}
}
function getParam(){
	var link = document.location.href;
	if(link.indexOf('?')>0){
		var getString = link.split('?')[1];
		var GET = getString.split('&');
		var data = {};
		for (i = 0, l = GET.length; i < l; i++){
			var tmp = GET[i].split('=');
			data[tmp[0]] = unescape(decodeURI(tmp[1]));
		}
		return data;
	}
}
var n = 300000;				//Asignacion de caducidad de tiempo de sesiones, esta variable esta delimitada a 5 minutos
var timeS;
function getDataTime(){
	clearTimeout(timeS);
	timeS = setTimeout(function(){ve({accion:'ltend'});},n);
}
function getpiepaginaData(){
  $.post('../../controlador/administrador/datacontroll.php',
	 {accion:'piedepagina'},
    function(data){
      $('#footerlier').html(data);
  });
}
function getdataintro(){
  $('#fores').empty();
  $('#forms_d').empty();
  $('#tableS').empty();
    $.post('../../controlador/administrador/datacontroll.php',
	 {accion:'contenidointro'},
    function(data){
      $('#contenidoIntro').html(data);
  });
}