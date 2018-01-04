<?php
	require_once $_SERVER['DOCUMENT_ROOT'].ruta::ruta."/vista/vistashtml/administrador/accmenu.php";
	require_once $_SERVER['DOCUMENT_ROOT'].ruta::ruta."/modelo/dao/administrador/dataUserDao.php";
	require_once $_SERVER['DOCUMENT_ROOT'].ruta::ruta."/modelo/dao/administrador/regs.php";
	require_once $_SERVER['DOCUMENT_ROOT'].ruta::ruta."/vista/vistashtml/administrador/datauserlib.php";
	require_once $_SERVER['DOCUMENT_ROOT'].ruta::ruta."/vista/vistashtml/administrador/formularios.php";
	require_once $_SERVER['DOCUMENT_ROOT'].ruta::ruta."/vista/vistashtml/administrador/msgModal.php";
	class boacciones{
		private $vista;
		private $vistaT;
		private $vistaF;
		private $dao;
		private $tablaA;
		private $mensajes;
		function __construct(){
			$this->vista = new accVista();
			$this->vistaT = new getContenidoAdmin();
			$this->vistaF = new accFormularios();
			$this->dao = new daousuario(); //nueva instancia
			$this->tablaA = new daoregs();
			$this->mensajes = new msgModal();
		}
		function getEncabezadoData($modulo){
			$periodoAct = $this->getPeriodoActivoLinea();
			$encabezado = $this->dao->getDataUsuario($modulo);
			$pdata = $this->dao->getDataUsuario($modulo);
			$vencabezado = $this->vista->getEncabezado($encabezado,$periodoAct);
			return $vencabezado;
		}
		function getAsesorTData($gen){
			$tableD = $this->tablaA->getDataAsesor($gen);
			$vt = $this->vistaT->getAsesorD($tableD);
			return $vt;
		}
		function getAdminTData(){
			$tableD = $this->tablaA->getDataAdmin();
			$vt = $this->vistaT->getAdminD($tableD);
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
      	// Apartado de actualizacion (&actualiza)
      	function getActualizaAsesorData($modulo){
			$especialidad = $this->tablaA->getEspecialidad();
          	$dataUsuario = $this->tablaA->getDataUsuario($modulo->DNI);
			$vf = $this->vistaF->getRegistroUsuarioAdmn(2,$especialidad,2,$dataUsuario);
			return $vf;
		}
		function getActualizaAlumnoData($modulo){
			$especialidad = $this->tablaA->getEspecialidad();
          	$dataUsuario = $this->tablaA->getDataUsuario($modulo->DNI);
			$vf = $this->vistaF->getRegistroUsuarioAdmn(2,$especialidad,3,$dataUsuario);
			return $vf;
		}
		function getActualizaAdministradorData($modulo){
			$especialidad = $this->tablaA->getEspecialidad();
			$dataUsuario = $this->tablaA->getDataUsuario($modulo->DNI);
          	$vf = $this->vistaF->getRegistroUsuarioAdmn(2,$especialidad,1,$dataUsuario);
			return $vf;
		}
		function modUsuario($modClass){
		   $datav = $this->tablaA->setDataUsuario($modClass->returnDataUpdUsuarioArray());
		   $estadoResultadoActualizar = $datav[0]['statusActualiza'];
		   if($estadoResultadoActualizar == 0){
		      return $this->mensajes->getModalMsg('Usuario actualizado','Los campos de datos del usuario, se han actualizado');
		   }else{
		      return $this->mensajes->getModalMsg('Usuario actualizado','El usuario no existe');
		   }
		}
      	// Apartado de actualizacion (&actualiza)
		function setUsuario($modulo){
		    $regtst = $this->tablaA->setUsuario($modulo);
		    $vf = $this->vistaF->getMsgEstadoRegistro($regtst[0]);
		    return $vf;
		}
		function getPeriodo(){
		    $regtst = $this->tablaA->isPg();
		    $vf = $this->vistaF->isPPeriodo($regtst[0]);
		    return $vf;
		}
		function getPeriodoActivoLinea(){
			$postLin = $this->dao->getPeriodoActivo();
			return $postLin;
		}
		function getFormularioEstadistica(){
		    $postData = $this->vistaT->getFormParamEstadistica();
		    return $postData;
		}
		function getPiedePagina(){
		    $postData = $this->vista->getPiePagina(array(),array());
		    return $postData;
		}
		function getContenidoIntro(){
		    $postData = $this->vistaT->getInfoIntro();
		    return $postData;
		}
		function getGraficoPSolicitud($modulo){
		  $regulacionCampo = '';
		  switch ($modulo->generoGrafico) {
		  	case 1:
			  $regulacionCampo = '';
		  	break;
		  	case 2:
			  $regulacionCampo = "WHERE Csexo_usuario = 'F'";
		  	break;
		  	case 3:
			  $regulacionCampo = "WHERE Csexo_usuario = 'M'";
		  	break;
		  }
		  $postData = '';
		  $Vgrafico = '';
		  switch($modulo->campoGrafico){
			case 1:
			  if($modulo->generoGrafico == 1){
			     $postData = $this->tablaA->getProfesoresAlumnosFinalGrap(1);
			     $Vgrafico = $this->vistaT->getGraficoPFinalizado($postData,'# Alumnos finalizando');
			  }
			  if($modulo->generoGrafico == 2){
			     $postData = $this->tablaA->getProfesoresAlumnosFinalGrap(3);
			     $Vgrafico = $this->vistaT->getGraficoPFinalizado($postData,'# Alumnos finalizado');
			  }
			  if($modulo->generoGrafico == 3){
			     $postData = $this->tablaA->getProfesoresAlumnosFinalGrap(4);
			     $Vgrafico = $this->vistaT->getGraficoPFinalizado($postData,'# Alumnos finalizado');
			  }
		  	break;
		  	case 2:
			  if($modulo->generoGrafico == 1){
			     $postData = $this->tablaA->getProfesoresAlumnosFinalGrap(2);
			     $Vgrafico = $this->vistaT->getGraficoPFinalizado($postData,'# Alumnos finalizando');
			  }
			  if($modulo->generoGrafico == 2){
			     $postData = $this->tablaA->getProfesoresAlumnosFinalGrap(5);
			     $Vgrafico = $this->vistaT->getGraficoPFinalizado($postData,'# Alumnos finalizado');
			  }
			  if($modulo->generoGrafico == 3){
			     $postData = $this->tablaA->getProfesoresAlumnosFinalGrap(6);
			     $Vgrafico = $this->vistaT->getGraficoPFinalizado($postData,'# Alumnos finalizado');
			  }
		  	break;
		  	case 3:
			   if($modulo->generoGrafico == 1){
			     $postData = $this->tablaA->getProfesoresAlumnosFinalGrap(7);
			     $Vgrafico = $this->vistaT->getGraficoPFinalizado($postData,'# Alumnos');
			  }
			  if($modulo->generoGrafico == 2){
			     $postData = $this->tablaA->getProfesoresAlumnosFinalGrap(8);
			     $Vgrafico = $this->vistaT->getGraficoPFinalizado($postData,'# Alumnos');
			  }
			  if($modulo->generoGrafico == 3){
			     $postData = $this->tablaA->getProfesoresAlumnosFinalGrap(9);
			     $Vgrafico = $this->vistaT->getGraficoPFinalizado($postData,'# Alumnos');
			  }
		  	break;
		  	case 4:
			  $postData = $this->tablaA->getProfesoresSolicitudGrap($regulacionCampo);
			  $Vgrafico = $this->vistaT->getGraficoPSolicitud($postData,'# Solicitudes enviadas');
		  	break;
		  	case 5://getProfesoresFinalGrap
			  $postData = $this->tablaA->getProfesoresFinalGrap($regulacionCampo);
			  $Vgrafico = $this->vistaT->getGraficoPSolicitud($postData,'# Alumnos que concluyo recidencias profesionales');
		  	break;
		  }
		  return $Vgrafico;
		}
		function getBaseDatosForm(){
		    $formData = $this->vistaT->getformularioViewDB();
		    return $formData;
		}
		function getBaseDatosLog(){
		    $formData = $this->vistaT->getBaseDatosViewLog();
		    return $formData;
		}
		function crearRespaldoDB(){
		    $formData = $this->tablaA->GETrespaldoDB();
		    return $formData;
		}
		function iniciarLogsDB(){
		    $formData = $this->tablaA->GETlogs_enableTable();
		    return $this->mensajes->getModalMsg('Iniciando el registro de logs en MariaDB','
		    La siguiente operaci&oacute;n habilitara las funciones necesarias para plasmar los logs en la base de datos, la tabla correspondiente sigue creciendo respecto a la cantidad de operaciones que se realizan en el sistema, se recomienda deshabilitarla, o en este caso detener el registro de procesos.
		    <br>Por defecto, todos los registros est&aacute;n deshabilitados o escritos en archivos. El registro general de consultas y el registro lento de consultas tambi&eacute;n se pueden escribir en tablas especiales en la base de datos mysql.
		    <script>
		    $(document).ready(function(){
		    $("#modal1").modal();
		    $("#modal1").modal("open");
		    });
		    </script>
		    ');
		}
		function detenerLogsDB(){
		    $formData = $this->tablaA->GETlogs_disableTable();
		    return $this->mensajes->getModalMsg('Deteniendo el registro de logs en MariaDB','
		    La siguiente operaci&oacute;n detendra las funciones necesarias para plasmar los logs en la base de datos.
		    <br>
		    Por defecto, todos los registros est&aacute;n deshabilitados o escritos en archivos. El registro general de consultas y el registro lento de consultas tambi&eacute;n se pueden escribir en tablas especiales en la base de datos mysql.
		    <script>
		    $(document).ready(function(){
		    $("#modal1").modal();
		    $("#modal1").modal("open");
		    });
		    </script>
		    ');
		}
		function limpiarLogsDB(){
		    $formData = $this->tablaA->GETlogs_truncate();
		    return $this->mensajes->getModalMsg('Limpiando el registro de logs en MariaDB','
		    La siguiente operaci&oacute;n eliminara todos los registros de logs en la base de datos.
		    <br>
		    Por defecto, todos los registros est&aacute;n deshabilitados o escritos en archivos. El registro general de consultas y el registro lento de consultas tambi&eacute;n se pueden escribir en tablas especiales en la base de datos mysql.
		    <script>
		    $(document).ready(function(){
		    $("#modal1").modal();
		    $("#modal1").modal("open");
		    });
		    </script>
		    ');
		}
		function mostrarLogsDB(){
		    $formData = $this->tablaA->GETlogs_show();
		    $dataRes = $this->vistaT->getTablaLogsData($formData);
		    return $dataRes;
		}
	}
?>
