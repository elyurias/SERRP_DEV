<?php
	//require_once "../../../ruta.php";
	require_once $_SERVER['DOCUMENT_ROOT'].ruta::ruta."/modelo/dao/db/conexion.php";
	require_once $_SERVER['DOCUMENT_ROOT'].ruta::ruta."/modelo/dao/administrador/abclDao.php";
	
	class daousuario{
		private $conn;
		function __construct(){
			$this->conn=conexion::conectar();
		}
		function __destruct(){
			//$this->conn->close();	
		}
		function getDataUsuario($modulo){
			$datosArray = array($modulo);
			$pR = conexion::getArraypP(adminABC::sqlGetData(), $datosArray);
			return $pR;
		}
	}
?>
