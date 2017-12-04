<?php
	require_once $_SERVER['DOCUMENT_ROOT'].ruta::ruta."/vista/vistashtml/intfzholamundo.php";
	require_once $_SERVER['DOCUMENT_ROOT'].ruta::ruta."/modelo/dao/daoAlumno.php";
	
	class mensajebo{
		private $vista;
		private $dao;
		function __construct(){
			$this->vista = new primervistaholamundo();
			$this->dao = new daoAlumno(); //nueva instancia
		}
		function funcionbomensaje($r){
			return $this->vista->functionvistafinal($r);
		}
		function funcionbomensajedos($r){
			return $this->vista->functionvistafinaldos($r);
		}
		function funcionregistra($modulo){
         $mensaje=$this->dao->insertarAlumnosdao($modulo);
         return $mensaje;
		}
	}
?>