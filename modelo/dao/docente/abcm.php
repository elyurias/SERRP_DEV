<?php
	class sqlPartDoc{
		static function SqlGetPeriodos(){
			return 'SELECT * FROM getperiododocenteis WHERE VidentiQR_usuario = ?';
		}
		static function SqlGetSolicitudes(){
			return 'Enrique va a hacer esta parte';
		}
		static function SqlGetAlumnosGeneracion(){
			return 'SELECT * FROM getalumnos_docente_periodo WHERE id_asesor = ?';
		}
		static function SqlGetAlumnosDocumento(){
			return 'SELECT * FROM get_documentos_data where id_alumno = ?;';
		}
	}
?>