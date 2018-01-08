<?php
	//require_once "../../../ruta.php";
	require_once $_SERVER['DOCUMENT_ROOT'].ruta::ruta."/modelo/dao/db/conexion.php";
	require_once $_SERVER['DOCUMENT_ROOT'].ruta::ruta."/modelo/dao/docente/abcm.php";
	class daodocente{
		private $conn;
		function __construct(){
			$this->conn=conexion::conectar();
		}
		function getperiodos($id_QR){
			$pR = conexion::getArraypP(sqlPartDoc::SqlGetPeriodos(), array($id_QR));
			return $pR;
		}
		function getsolicitud($id_QR){
			$pR = array('Configurar');
			return $pR;
		}
		function getalumnosdocente($id_asesor){
		    $pR = conexion::getArraypP(sqlPartDoc::SqlGetAlumnosGeneracion(), array($id_asesor));
		    return $pR;
		}
	}
?>
