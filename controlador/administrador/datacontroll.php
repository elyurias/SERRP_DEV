<?php
	 error_reporting(E_ALL);
	 require_once "../../ruta.php";
	 require_once $_SERVER['DOCUMENT_ROOT'].ruta::ruta."/vista/vistashtml/administrador/accmenu.php";
	 require_once $_SERVER['DOCUMENT_ROOT'].ruta::ruta."/modelo/bo/administrador/acciones.php";
	 require_once $_SERVER['DOCUMENT_ROOT'].ruta::ruta."/modelo/bo/session.class.php";
	 require_once $_SERVER['DOCUMENT_ROOT'].ruta::ruta."/modelo/objetos/administrador/loginobj.php";
	 $bo = new boacciones();
	 $se = new session();
	 $obj = new admdata();
	 $resal = 'noOperacionNT';
	 switch($_REQUEST['accion']){
		case 'encabezado':
			$resal = $bo->getEncabezadoData($se->getDNI());
		break;
		case 'tablaasesor':
			$resal = $bo->getAsesorTData($_REQUEST['gen']);
		break;
		case 'tablaalumno':
			$resal = $bo->getAlumnoTData($_REQUEST['gen']);
		break;
		case 'tablaadmin':
			$resal = $bo->getAdminTData();
		break;
       	case 'loadGp':
			$resal = $bo->getPeriodo();
		break;
		case 'formadmin':
			$resal = $bo->getFormularioAdministradorData();
		break;
		case 'formdocente':
			$resal = $bo->getFormularioAsesorData();
		break;
		case 'formalumno':
			$resal = $bo->getFormularioAlumnoData();
		break;
		case 'registro':
		    $obj->DNI = $_REQUEST['id'];
		    $obj->tipo = $_REQUEST['tipo'];
		    $obj->nombre = $_REQUEST['nombre'];
		    $obj->paterno = $_REQUEST['paterno'];
		    $obj->materno = $_REQUEST['materno'];
		    $obj->email = $_REQUEST['email'];
		    $obj->tel1 = $_REQUEST['telc'];
		    $obj->tel2 = $_REQUEST['telh'];
		    $obj->especialidad = $_REQUEST['idesp'];
		    $obj->sexo = $_REQUEST['sexo'];
		    $obj->estado = $_REQUEST['estado'];
		    if($obj->tipo==2){
		        $obj->limite = $_REQUEST['maxmi'];
		    }else{
		        $obj->limite = 0;
		    }
		    $resal = $bo->setUsuario(array($obj->DNI,$obj->nombre,$obj->paterno,$obj->materno,$obj->email,$obj->tel1,$obj->tel2,$obj->estado,$obj->especialidad,$obj->sexo,$obj->tipo,$obj->limite));
		break;
        case 'actualizar':
       		$obj->DNI = $_REQUEST['id'];
		    $obj->nombre = $_REQUEST['nombre'];
		    $obj->paterno = $_REQUEST['paterno'];
		    $obj->materno = $_REQUEST['materno'];
		    $obj->email = $_REQUEST['email'];
		    $obj->tel1 = $_REQUEST['telc'];
		    $obj->tel2 = $_REQUEST['telh'];
		    $obj->especialidad = $_REQUEST['idesp'];
		    $obj->sexo = $_REQUEST['sexo'];
       		$resal = $bo->modUsuario($obj);
       	break;
       	case 'updadmin':
       		$obj->DNI = $_REQUEST['id'];
			$resal = $bo->getActualizaAdministradorData($obj);
		break;
		case 'upddocente':
       		$obj->DNI = $_REQUEST['id'];
			$resal = $bo->getActualizaAsesorData($obj);
		break;
		case 'updalumno':
       		$obj->DNI = $_REQUEST['id'];
			$resal = $bo->getActualizaAlumnoData($obj);
		break;
		case 'getgen':
			$resal = $bo->getDataGeneracion();
		break;
	}
	print($resal);
?>
