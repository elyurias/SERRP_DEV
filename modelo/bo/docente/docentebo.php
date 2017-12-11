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
	}
?>