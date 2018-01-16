<?php
	 // ruta y manejo de sesiones
	 require_once "../../ruta.php";
	 require_once $_SERVER['DOCUMENT_ROOT'].ruta::ruta."/modelo/bo/session.class.php";
	 require_once $_SERVER['DOCUMENT_ROOT'].ruta::ruta."/modelo/bo/docente/docentebo.php";	 
	 require_once $_SERVER['DOCUMENT_ROOT'].ruta::ruta."/modelo/objetos/administrador/loginobj.php";
	 $bo = new docentebo();
 	 $obj = new admdata();
	 $se = new session();
	 $resul = "noOpDoc";
	 if($se->isSession()){
	 	//manejo de controll
	 	switch($_REQUEST['accion']){
	 		case 'menudocente':
	 			$resul = $bo->getMenuDoc($se->getDNI());
	 		break;
	 		case 'getdocentesasesor':
				$obj->id_asesor = $_REQUEST['id_asesor'];
	 			$resul = $bo->getDataDoc($obj);
	 		break;
	 		case 'getdocentesasesordoc':
				$obj->id_alumno = $_REQUEST['id_alumno'];
	 			$resul = $bo->getDocumentosDocenteAlumno($obj);
	 		break;
	 		case 'getsolicitudesasesor':
				$obj->id_asesor = $_REQUEST['id_asesor'];
	 			$resul = $bo->getsoldocente($obj);
	 		break;
	 		default:
	 			$resul = $_REQUEST['accion'];
	 		break;
	 	}
	 }else{
	 	$resul = "noSesDoc";
	 }
	 print($resul);
?>