<?php
	require_once $_SERVER['DOCUMENT_ROOT'].ruta::ruta."/vista/vistashtml/administrador/loginV.php";
	require_once $_SERVER['DOCUMENT_ROOT'].ruta::ruta."/modelo/dao/administrador/loginDao.php";
	class bologin{
		private $vista;
		private $dao;
		function __construct(){
			$this->vista = new loginAdm();
			$this->dao = new daologin(); //nueva instancia
		}
		function consultaSession($modulo){
			$data = $this->dao->getSessionAdministrador($modulo);
			return $data;
		}
		function consultaStatus($modulo){
			$data = $this->dao->getSessionStatus($modulo);
			if($data[0]['estado'] == 1){
				return True;
			}else{
				return False;
			}
		}
	}
?>
