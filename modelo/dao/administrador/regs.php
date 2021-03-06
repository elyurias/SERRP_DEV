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
	 function getDataGeneracionTable(){
	    $pRE = conexion::getArraypP(adminABC::sqlGetGeneracionOrden(),array());
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
	 function getActualizaModLimitAsesorados($limite,$id_asesor){
	    $pRE = conexion::getArraypP(adminABC::sqlSetLimitUser(),array(2,$id_asesor,$id_asesor,$limite));
	    return $pRE[0]['statusActualiza'];
	 }
	 function getActualizaUpdLimitAsesorados($limite,$id_asesor){
	    $pRE = conexion::getArraypP(adminABC::sqlSetLimitUser(),array(2,$id_asesor,$id_asesor,$limite));
	    return $pRE[0]['statusActualiza'];
	 }
	 function getActualizaRegAsesor($limite,$id_asesor){
	    $pRE = conexion::getArraypP(adminABC::sqlSetLimitUser(),array(1,$id_asesor,$id_asesor,$limite));
	    return $pRE[0]['statusActualiza'];
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
	 function SETdatabase_resourse($rutaLier){
	    $pRE = conexion::restore_database($rutaLier);
	    return $pRE;
	 }
	 function get_es_ta_re_gis_tra_do($id_asesor){
	    $pRE = conexion::getArraypP(adminABC::sqlGetDocentePeriodo(),array($id_asesor));
	    return $pRE[0]['statusActualiza'];
	 }
	 function get_es_ta_re_gis_tra_do_a_lu_m_no($VidentiQR){
	    $pRE = conexion::getArraypP(adminABC::sqlGetAlumnoPeriodo(),array($VidentiQR));
	    return $pRE[0]['statusActualiza'];
	 }
	 function get_es_ta_re_gis_tra_do_a_lu_m_no_periodo($VidentiQR){
	    $pRE = conexion::getArraypP(adminABC::sqlSetAlumnoPeriodo(),array($VidentiQR));
	    return $pRE[0]['statusActualiza'];
	 }
	 function setPeriodoData($data){
	    $pRE = conexion::getArraypP(adminABC::sqlSetPeriodo(),$data);
	    return $pRE;
	 }
	}
?>