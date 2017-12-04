<?php
	//$_REQUEST usar de ahora en adelante porque adan es latoso e.e
	//ruta
	require_once "../ruta.php";
	//modelo
	//bo y dao
	 require_once $_SERVER['DOCUMENT_ROOT'].ruta::ruta."/modelo/bo/mensajebo.php";
	 require_once $_SERVER['DOCUMENT_ROOT'].ruta::ruta."/modelo/objetos/mensajeobjeto.php";
	$bo = new mensajebo();
	switch ($_REQUEST['action']) {
		case 'mensajeuno':
				$mensaje = new mensajeobjeto();
				$r = $bo->funcionbomensaje($mensaje);
				print $r;
			break;
		case 'mensajedos':
				$mensaje = new mensajeobjeto();
				$r = $bo->funcionbomensajedos($mensaje);
				print $r;
			break;
		case 'registraformulario':
				/*header("content-type:aplication/json");
					$formulario = new mensajeobjeto();
					$formulario->Vnombre = $_POST['nombre'];
					$formulario->Iedad   = $_POST['edad'];
					$r = $bo->funcionregistra($formulario);
				print $r (json_encode($r));*/
			break;
		default:
				print "Defecto";
		break;
	}
?>
