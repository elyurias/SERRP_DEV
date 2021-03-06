<?php
	//require_once '../../../ruta.php';
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
		function getDataTableGeneracion(){
			$datarow = $this->tablaA->getDataGeneracionTable();
			$vf = $this->vistaF->getTablaGeneracion($datarow);
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
		      return $this->mensajes->getModalMsgUPD('Usuario actualizado','Los campos de datos del usuario, se han actualizado');
		   }else{
		      return $this->mensajes->getModalMsgUPD('Usuario actualizado','El usuario no existe');
		   }
		}
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
		    return $this->mensajes->getModalMsg11DD2('Iniciando el registro de logs en MariaDB','
		    La siguiente operaci&oacute;n habilitara las funciones necesarias para plasmar los logs en la base de datos, la tabla correspondiente sigue creciendo respecto a la cantidad de operaciones que se realizan en el sistema, se recomienda deshabilitarla, o en este caso detener el registro de procesos.
		    <br>Por defecto, todos los registros est&aacute;n deshabilitados o escritos en archivos. El registro general de consultas y el registro lento de consultas tambi&eacute;n se pueden escribir en tablas especiales en la base de datos mysql.
		    <script>
		    $(document).ready(function(){
		    $("#modal1JAMON").modal();
		    $("#modal1JAMON").modal("open");
		    });
		    </script>
		    ');
		}
		function detenerLogsDB(){
		    $formData = $this->tablaA->GETlogs_disableTable();
		    return $this->mensajes->getModalMsg11DD2('Deteniendo el registro de logs en MariaDB','
		    La siguiente operaci&oacute;n detendra las funciones necesarias para plasmar los logs en la base de datos.
		    <br>
		    Por defecto, todos los registros est&aacute;n deshabilitados o escritos en archivos. El registro general de consultas y el registro lento de consultas tambi&eacute;n se pueden escribir en tablas especiales en la base de datos mysql.
		    <script>
		    $(document).ready(function(){
		    $("#modal1JAMON").modal();
		    $("#modal1JAMON").modal("open");
		    });
		    </script>
		    ');
		}
		function limpiarLogsDB(){
		    $formData = $this->tablaA->GETlogs_truncate();
		    return $this->mensajes->getModalMsg11DD2('Limpiando el registro de logs en MariaDB','
		    La siguiente operaci&oacute;n eliminara todos los registros de logs en la base de datos.
		    <br>
		    Por defecto, todos los registros est&aacute;n deshabilitados o escritos en archivos. El registro general de consultas y el registro lento de consultas tambi&eacute;n se pueden escribir en tablas especiales en la base de datos mysql.
		    <script>
		    $(document).ready(function(){
		    $("#modal1JAMON").modal();
		    $("#modal1JAMON").modal("open");
		    });
		    </script>
		    ');
		}
		function mostrarLogsDB(){
		    $formData = $this->tablaA->GETlogs_show();
		    $dataRes = $this->vistaT->getTablaLogsData($formData);
		    return $dataRes;
		}
		function restoredatabase($rutaL){
		    $formData = $this->tablaA->SETdatabase_resourse($rutaL);
		    if($formData==0){
		      $dataRes = $this->vistaT->getMensajesLogs('Base de datos restaurada');
		    }else{
		      $dataRes = $this->vistaT->getMensajesLogs('Error al restaurar la base de datos');
		    }
		    return $dataRes;
		}
		// limite asesor cambio
		function actualizarLimiteAsesor($classData){
		  if($classData->tipo_operacion == 1){
		    $dataRes = $this->tablaA->getActualizaModLimitAsesorados($classData->limit_data,$classData->id_asesor_data);
		    return $this->mensajes->getModalMsgActualiza('Control y Registro del l&iacute;mite de alumnos por asesor','
		    <br>
		    '.$this->statusAsesor($dataRes).'');
		  }else{
		  $dataRes = $this->tablaA->getActualizaUpdLimitAsesorados($classData->limit_data,$classData->id_asesor_data);
		    return $this->mensajes->getModalMsgActualiza('Control y Registro del l&iacute;mite de alumnos por asesor','
		    <br>
		    '.$this->statusAsesor($dataRes).'');
		  }
		}
		function mostrarLimiteAsesor($classData){
		    if($classData->tipo_operacion==1){
		      $dataRes = $this->vistaF->getFormModLimitAsesorados($classData->limit_data,$classData->id_asesor_data,
			"El cambio de l&iacute;mite en el n&uacute;mero de alumnos que puede aceptar el docente, 
			no afectar&aacute; la relaci&oacute;n existente con las previas solicitudes enviadas y aceptadas por los alumnos.
			<input type='hidden' value=1 name='tipo_operacion'/>
			"
		      );
		    }else{
		      $linea = $this->tablaA->get_es_ta_re_gis_tra_do($classData->id_asesor_data);
		      if($linea == 0){
			$dataRes = $this->vistaF->getFormModLimitAsesorados($classData->limit_data,$classData->id_asesor_data,
			  "El cambio de l&iacute;mite en el n&uacute;mero de alumnos que puede aceptar el docente, 
			  se actualizara y registrara el docente al nuevo periodo actual, tomando como referencia el periodo seleccionado
			  <input type='hidden' value=2 name='tipo_operacion'/>
			  "
			);
		      }else{
		      $dataRes = $this->mensajes->getModalMsgStatusRegistro('Estado de registro, el usuario ya esta registrado','
			  El docente ya esta registrado en el periodo actual.');
		      }
		    }
		    return $dataRes;
		}
		 /* '\n	
		    1 Registrar en el periodo actual\n    \n    
		    2 Actualizar limite del usuario en el periodo actual\n	\n    
		    ________________________________________________\n
		    \n    
		    1 No esta registrado,\n    \n    
		    2 Ya esta registrado en el periodo actual\n    \n    
		    3 Registrado en el periodo actual [con limite]\n \n    
		    4  Actualizar limite de asesor\n'*/
		function statusAsesor($id){
		  switch ($id) {
		  	case 1:
			  return 'El usuario se ha registrado en el periodo activo de Residencias Profesionales';
		  	break;
		  	case 2:
			  return 'El usuario ya se encuentra registrado en el periodo activo de Residencias Profesionales';
		  	break;
		  	case 3:
			  return 'Se ha registrado el asesor en el periodo activo de Residencias Profesionales, agregando el l&iacute;mite de asesorados.';		  	
		  	break;
		  	case 4:
			  return 'Se ha actualizado el l&iacute;mite m&aacute;ximo del docente en el periodo seleccionado';
		  	break;
		  }
		  return 'NOT_OP_SELECTED_ERROR_1';
		}
		
		function actualizarRegistroAsesor($classData){
		    if($classData->tipo_operacion==2){
		      $dataRes = $this->tablaA->getActualizaRegAsesor($classData->limit_data,$classData->id_asesor_data);
		    }else{
		      $dataRes = $this->tablaA->getActualizaUpdLimitAsesorados($classData->limit_data,$classData->id_asesor_data);
		    }
		    $mensajeModuloDir =  $this->mensajes->getModalMsg11D('Control y Registro del l&iacute;mite de alumnos por asesor','
		    '.$this->statusAsesor($dataRes).'
		    <script>
		    $(document).ready(function(){
		    $("#modal232").modal();
		    $("#modal232").modal("open");
		    console.log("'.$dataRes.'");
		    });
		    </script>
		    ');
		    return $mensajeModuloDir;
		}
		function getStatusRegistroalumnoPeriodoActual($classReg){
		    $statusVal = $this->tablaA->get_es_ta_re_gis_tra_do_a_lu_m_no($classReg->id_alumno_data);
		    if($statusVal == 1){
		      $mensajeModuloDir =  $this->mensajes->getModalMsg11D('Control y Registro de alumnos','
			  El alumno ya esta registrado en el periodo actual.
			 <script>
			  $(document).ready(function(){
			  $("#modal232").modal();
			  $("#modal232").modal("open");
			  console.log("'.$dataRes.'");});
			 </script>');
		    }else{
		      $id_data_alumno = $classReg->id_alumno_data;
		      $nvalData = '
		      
		      <div class="valign-wrapper">
		      
		      <button 
		      
		      onclick = 
			"dataClassDocente.regUpdUsuarioAlumn('.$id_data_alumno.');" 
		      
		      class=
			"btn waves-effect waves-teal blue center modal-action modal-close"
		      >
		      
		      Registrar en el periodo actual
		      
		      </button>
		      
		      </div>';
		      
		      $mensajeModuloDir =  $this->mensajes->getModalMsg11DD('Control y Registro de alumnos','
			  El alumno no esta registrado en el periodo actual, Desea registrar al alumno en el periodo actual?
			 <script>
			  $(document).ready(function(){
			  $("#modal232").modal();
			  $("#modal232").modal("open");
			  });
			 </script>',$nvalData);
		    }
		    return $mensajeModuloDir;
		}
		

		function getRegRegistroalumnoPeriodoActual($classReg){
		    $statusVal = $this->tablaA->get_es_ta_re_gis_tra_do_a_lu_m_no_periodo($classReg->id_alumno_data);
		    if($statusVal == 1){
		      $mensajeModuloDir =  $this->mensajes->getModalMsg11D('Control y Registro del l&iacute;mite de alumnos','
			  El alumno ya esta registrado en el periodo actual.
			 <script>
			  $(document).ready(function(){
			  $("#modal232").modal();
			  $("#modal232").modal("open");
			  console.log("'.$dataRes.'");});
			 </script>');
		    }else{
		      $mensajeModuloDir =  $this->mensajes->getModalMsg11D('Control y Registro del l&iacute;mite de alumnos','
			  El alumno ha sido registrado en el periodo actual
			  <script>
			  $(document).ready(function(){
			  $("#modal232").modal();
			  $("#modal232").modal("open");
			  console.log("'.$dataRes.'");});
			 </script>');
		    }
		    return $mensajeModuloDir;
		}
		function getformnuevogeneracion(){
		    return $this->vistaF->getformregistrarperiodo();
		}
		function setPeriodoNuevo($classRow){
		    $statusVal = $this->tablaA->setPeriodoData(array($classRow->nombre_periodo,$classRow->fecha_uno,$classRow->fecha_dos));
		    return var_dump($statusVal);
		}
	}
?>
