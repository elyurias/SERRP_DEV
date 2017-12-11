<?php
	 // ruta y manejo de sesiones
	 require_once "../../ruta.php";
	 require_once $_SERVER['DOCUMENT_ROOT'].ruta::ruta."/modelo/bo/session.class.php";
     require_once $_SERVER['DOCUMENT_ROOT'].ruta::ruta."/modelo/bo/docente/docentebo.php";	 
	 $bo = new docentebo();
	 $se = new session();
	 $resul = "noOpDoc";
	 if($se->isSession()){
	 	//manejo de controll
	 	switch($_REQUEST['accion']){
	 		case 'menudocente':
	 			//menu proncupal del docente
	 			$resul = $bo->getMenuDoc($se->getDNI());
	 		break;
	 		default:
	 			$resul = "noAccDoc";
	 		break;
	 	}
	 }else{
	 	$resul = "noSesDoc";
	 }
	 print($resul);
?>