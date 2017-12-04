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
		function getEspecialidad(){
			$pRE = conexion::getArraypP(adminABC::sqlGetEspecialidad(), array());
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
	}
?>