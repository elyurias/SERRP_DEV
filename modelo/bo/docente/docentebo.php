<?php
	require_once $_SERVER['DOCUMENT_ROOT'].ruta::ruta."/modelo/dao/docente/acciones.php";
	require_once $_SERVER['DOCUMENT_ROOT'].ruta::ruta."/vista/vistashtml/docente/vistadoc.php";
	class docentebo{
		public $vistadoc;
		public $daodoc;
		function __construct(){
			$this->vistadoc = new vistadocente();
			$this->daodoc = new daodocente();
		}
		public function getMenuDoc($id_DNI){
			$resP = $this->daodoc->getperiodos($id_DNI);
			$resS = $this->daodoc->getsolicitud($id_DNI);
			$vf = $this->vistadoc->getMenuDocenteFinal($resP,$resS);
			return $vf;
		}
		public function getDataDoc($classMod){
			$resP = $this->daodoc->getalumnosdocente($classMod->id_asesor);
			$vf = $this->vistadoc->getAsesoradosFinal($resP);
			return $vf;
		}
		public function getDocumentosDocenteAlumno($classMod){
			$resP = $this->daodoc->getDocumentosDataAlumno($classMod->id_alumno);
			$vf = $this->vistadoc->getAsesoradosDocumentoFinal($resP);
			return $vf;
		}
		public function getsoldocente($classMod){
			$resP = $this->daodoc->getDocentesSolicitud($classMod->id_asesor);
			$vf = $this->vistadoc->getSolicitudes($resP);
			return $vf;
		}
	}
?>