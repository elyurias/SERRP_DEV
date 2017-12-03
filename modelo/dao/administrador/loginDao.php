<?php
	//require_once "../../../ruta.php";
	require_once $_SERVER['DOCUMENT_ROOT'].ruta::ruta."/modelo/dao/db/conexion.php";
	require_once $_SERVER['DOCUMENT_ROOT'].ruta::ruta."/modelo/dao/db/procesaParametros.php";
	require_once $_SERVER['DOCUMENT_ROOT'].ruta::ruta."/modelo/dao/administrador/abclDao.php";
	
	class daologin{
		private $conn;
		function __construct(){
			$this->conn=conexion::conectar();
		}
		function __destruct(){
			//$this->conn->close();	
		}
		function getPerfilAdministrador($modulo){
				
		}
		function getSessionAdministrador($modulo){
			$datosArray = array($modulo->DNI);
			$pR = conexion::getArraypP(adminABC::sqlGetDataAdmCall(), $datosArray);
			return $pR;
		}
		function getSessionStatus($modulo){
			$datosArray = array($modulo->DNI);
			$pR = conexion::getArraypP(adminABC::sqlGetStatusCall(), $datosArray);
			return $pR;
		}
	}
?>
