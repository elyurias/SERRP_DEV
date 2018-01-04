<?php
	//require_once "../../../ruta.php";
	require_once $_SERVER['DOCUMENT_ROOT'].ruta::ruta."/modelo/dao/db/conexion.php";
	require_once $_SERVER['DOCUMENT_ROOT'].ruta::ruta."/modelo/dao/administrador/abclDao.php";
	
	class daoregs{
		private $conn;
		function __construct(){
			$this->conn=conexion::conectar();
		}
		function __destruct(){
			//$this->conn->close();	
		}
		function getDataAsesor($cg){
			$pR = conexion::getArraypP(adminABC::sqlGetAsesorData(), array($cg));
			return $pR;
		}
    	function getDataAlumno($cg){
			$pR = conexion::getArraypP(adminABC::sqlGetAlumnoData(), array($cg));
			return $pR;
		}
		function getDataAdmin(){
			$pR = conexion::getArraypP(adminABC::sqlGetAdminData(), array());
			return $pR;
		}
		function getEspecialidad(){
			$pRE = conexion::getArraypP(adminABC::sqlGetEspecialidad(), array());
			return $pRE;
		}
      	function getDataUsuario($id){
			$pRE = conexion::getArraypP(adminABC::sqlGetData(), array($id));
			return $pRE;
		}
		function setUsuario($modulo){
		    $pRE = conexion::getArraypP(adminABC::sqlSetUsuario(),$modulo);
		    return $pRE;
		}
		function getDataGeneracion(){
		    $pRE = conexion::getArraypP(adminABC::sqlGetGeneracion(),array());
		    return $pRE;
		}
      	function setDataUsuario($mod){
		    $pRE = conexion::getArraypP(adminABC::sqlSetDataUsuarioMod(),$mod);
		    return $pRE;
		}
      	function isPg(){
          	$pRE = conexion::getArraypP(adminABC::sqlSetGeneracionN(),array());
		    return $pRE;
	      }
	 function getProfesoresSolicitudGrap($opcion){
		$pRE = conexion::getArraypP(adminABC::sqlGetSolProfesor($opcion),array());
		return $pRE;
	 }
	 function getProfesoresFinalGrap($opciones){
	    $pRE = conexion::getArraypP(adminABC::sqlGetFinProfesor($opciones),array());
	    return $pRE;
	 }
	 function getProfesoresAlumnosFinalGrap($opcion){
	  $pRE = '';
	    switch ($opcion) {
	    	case 1:
		  $pRE = conexion::getArraypP(adminABC::sqlGetFin4MesProfesor(),array());
	    	break;
	    	case 2:
		  $pRE = conexion::getArraypP(adminABC::sqlGetFin6MesProfesor(),array());
	    	break;
	    	case 3:
		  $pRE = conexion::getArraypP(adminABC::sqlGetFin4MesProfesorMasculino(),array());
	    	break;
	    	case 4:
		  $pRE = conexion::getArraypP(adminABC::sqlGetFin4MesProfesorFemenino(),array());
	    	break;
	    	case 5:
		  $pRE = conexion::getArraypP(adminABC::sqlGetFin6MesProfesorMasculino(),array());
	    	break;
	    	case 6:
		  $pRE = conexion::getArraypP(adminABC::sqlGetFin6MesProfesorFemenino(),array());
	    	break;
	    	
	    	case 7:
		  $pRE = conexion::getArraypP(adminABC::sqlGetNoFin(),array());
	    	break;
	    	case 8:
		  $pRE = conexion::getArraypP(adminABC::sqlGetNoFinFemenino(),array());
	    	break;
	    	case 9:
		  $pRE = conexion::getArraypP(adminABC::sqlGetNoFinMasculino(),array());
	    	break;
	    	
	    }
	    return $pRE;
	 }
	 function GETrespaldoDB(){
	    $pRE = conexion::respaldoDB();
	    return $pRE;
	 }
	 function GETlogs_enableTable(){
	    $pRE = conexion::logs_enableTable();
	    return $pRE;
	 }
	 function GETlogs_disableTable(){
	    $pRE = conexion::logs_disableTable();
	    return $pRE;
	 }
	 function GETlogs_show(){
	    $pRE = conexion::logs_show();
	    return $pRE;
	 }
	 function GETlogs_truncate(){
	    $pRE = conexion::logs_truncate();
	    return $pRE;
	 }
	}
?>