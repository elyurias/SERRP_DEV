<?php
	require_once $_SERVER['DOCUMENT_ROOT'].ruta::ruta."/vista/vistashtml/administrador/accmenu.php";
	require_once $_SERVER['DOCUMENT_ROOT'].ruta::ruta."/modelo/dao/administrador/dataUserDao.php";
	require_once $_SERVER['DOCUMENT_ROOT'].ruta::ruta."/modelo/dao/administrador/regs.php";
	require_once $_SERVER['DOCUMENT_ROOT'].ruta::ruta."/vista/vistashtml/administrador/datauserlib.php";
	require_once $_SERVER['DOCUMENT_ROOT'].ruta::ruta."/vista/vistashtml/administrador/formularios.php";
	class boacciones{
		private $vista;
		private $vistaT;
		private $vistaF;
		private $dao;
		private $tablaA;
		function __construct(){
			$this->vista = new accVista();
			$this->vistaT = new getContenidoAdmin();
			$this->vistaF = new accFormularios();
			$this->dao = new daousuario(); //nueva instancia
			$this->tablaA = new daoregs();
		}
		function getEncabezadoData($modulo){
			$encabezado = $this->dao->getDataUsuario($modulo);
			$pdata = $this->dao->getDataUsuario($modulo);
			$vencabezado = $this->vista->getEncabezado($encabezado);
			return $vencabezado;
		}
		function getAsesorTData($gen){
			$tableD = $this->tablaA->getDataAsesor($gen);
			$vt = $this->vistaT->getAsesorD($tableD);
			return $vt;
		}
		function getAlumnoTData($gen){
	        $tableD = $this->tablaA->getDataAlumno($gen);
			$vt = $this->vistaT->getAlumnoD($tableD);
			return $vt;
		}
		function getDataGeneracion(){
	        $regs = $this->tablaA->getDataGeneracion();
			$vt = $this->vistaF->getSelectGenData($regs);
			return $vt;
		}
		// 1 insert, 2 update en el primer
		// $especialidad retorno de css
		// 1,2,3 el tipo
		function getFormularioAsesorData(){
			$especialidad = $this->tablaA->getEspecialidad();
			$vf = $this->vistaF->getRegistroUsuarioAdmn(1,$especialidad,2,array());
			return $vf;
		}
		function getFormularioAlumnoData(){
			$especialidad = $this->tablaA->getEspecialidad();
			$vf = $this->vistaF->getRegistroUsuarioAdmn(1,$especialidad,3,array());
			return $vf;
		}
		function getFormularioAdministradorData(){
			$especialidad = $this->tablaA->getEspecialidad();
			$vf = $this->vistaF->getRegistroUsuarioAdmn(1,$especialidad,1,array());
			return $vf;
		}
		function setUsuario($modulo){
		    $regtst = $this->tablaA->setUsuario($modulo);
		    $vf = $this->vistaF->getMsgEstadoRegistro($regtst[0]);
		    return $vf;
		}
	}
?>
